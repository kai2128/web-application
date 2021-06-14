<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';
    $db = Database::getInstance();

    if($_SESSION['type'] != "Guest"){
      $memberid = $_SESSION['id'];
      //get member delivery address
      //SELECT CONCAT(street, " ", postcode, " ", state, " ", country) AS Address FROM user WHERE id=6;
      $addressSql = "SELECT CONCAT(street, ' ', postcode, ' ', state, ' ', country) AS address FROM user WHERE id={$memberid}";
      $address = $db->fetch($addressSql);

      //get all current member added cart
      $getCartSql = "SELECT * FROM `cart` WHERE memberid={$memberid}";

      //get all order
      $orderSql="SELECT * FROM `order` WHERE member_id={$memberid}";

      //remove button is clicked - remove item from cart
      if(isset($_GET['remove'])){
        
        $itemIdToBeRemoved = $_GET['itemid'];
        $itemsizeToBeRemoved = $_GET['itemsize'];

        $removeSql = "DELETE FROM cart WHERE memberid={$memberid} AND itemid={$itemIdToBeRemoved} AND itemsize={$itemsizeToBeRemoved}";

        //delete cart item
        $db->exec($removeSql);
      }


      //decrement button is clicked
      if(isset($_GET['decrement'])){
        if($_GET['newqty'] > 0){
 
            //UPDATE `cart` SET `itemqty`=`itemqty`-1 WHERE memberid=6 AND itemid=2 AND item size=6.0
            $decrementSql = "UPDATE `cart` SET `itemqty`=`itemqty`-1 WHERE memberid={$memberid} AND itemid={$_GET['itemid']} AND itemsize={$_GET['itemsize']}";

            $db->exec($decrementSql);
            
            
        }
      }

      //increment button is click
      if(isset($_GET['increment'])){
          if($_GET['newqty'] < 100){
              $incrementSql = "UPDATE `cart` SET `itemqty`=`itemqty`+1 WHERE memberid={$memberid} AND itemid={$_GET['itemid']} AND itemsize={$_GET['itemsize']}";
              $db->exec($incrementSql);
          }
      }

      //if checkout is pressed
      if(isset($_GET['checkout'])){
        $clearCartSql = "DELETE FROM `cart` WHERE `memberid`={$memberid}";
        $db->exec($clearCartSql);

        //return to homepage
        header("location: home.php");
      }

      if($db->rowCount($getCartSql) > 0){
        $cartList = $db->fetchAll($getCartSql);

        // select all item details from item table base on cart item id
        // unitprice is after calculate with discount
        //SELECT i.*,c.itemsize,c.itemqty, (c.itemqty * i.price*((100-i.discount)/100)) as unitprice FROM `item` i JOIN `cart` c ON i.id=c.itemid WHERE c.memberid=6
        $getCartItemDetailsSql = "SELECT i.*,c.itemsize,c.itemqty, TRUNCATE((c.itemqty * i.price*((100-i.discount)/100)), 2) as unitprice FROM `item` i JOIN `cart` c ON i.id=c.itemid WHERE c.memberid={$memberid} ";
      }

      if(isset($_POST['checkout'])){
        $countSql="SELECT * FROM `order`";
        $orderid=($db->rowCount($countSql))+1;
        $deliveryAddress=$_POST['deliveryAddress'];
        $subtotal=$_POST['subtotal'];
        $deliveryFee=$_POST['deliveryfee'];
        $total=$_POST['total'];
        $checkoutSql="INSERT INTO `order`(`id`, `member_id`, `delivery_address`, `subtotal`, `delivery_fee`, `total_price`) VALUES ('$orderid','$memberid','$deliveryAddress','$subtotal','$deliveryFee','$total')";
        $db->exec($checkoutSql);
        $cart = $db->fetchAll($getCartSql);
        
        
        $sql="SELECT * FROM `order_details`";
        $orderdetailsid=$db->rowCount($sql);
        foreach($cart as $row){
          $orderdetailsid++;
          echo $orderdetailsid;
          $itemid=$row['itemid'];
          $itemsize=$row['itemsize'];
          $itemquantity=$row['itemqty'];
          $orderDetailsSql="INSERT INTO `order_details`(`id`, `orderid`, `itemid`, `size`, `quantity`, `review`) VALUES ('$orderdetailsid','$orderid','$itemid','$itemsize','$itemquantity','0')";
          $db->exec($orderDetailsSql);
        }
        $removeSql = "DELETE FROM cart WHERE memberid={$memberid}";

        //delete cart item
        $db->exec($removeSql);
        echo "<meta http-equiv='refresh' content='0'>";
      }
    }
?>

<!doctype html>
<html lang="en">

<head>
  
  <title>Shopping Cart</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/shopMan.css">
  <link rel="stylesheet" href="../style/animationBackground.css">
  <?php if($_SESSION['type']!="Guest"){ if($_SESSION['gender']=="F") { ?>
    <link rel="stylesheet" href="../style/shopWoman.css">
    <?php }} ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    .navigation a:nth-child(2){
        font-weight: bold;
        color: white;
        border-bottom: 5px solid white;
    }
  </style>
</head>

<body onload="calculateTotalPrice()">
  
    <?php include ('../includes/header_navMenu_burgerMenu.php') ?>
  <div class="background">
  <div class="content">
  <?php if($_SESSION['type']!="Guest"){ ?>
    <div class="cart">
          <!--if cart is not empty-->
          <?php if($db->rowCount($getCartSql) > 0): ?>
          <?php $result = $db->getResult($getCartItemDetailsSql);?>
          <div class="cartopt">
            <div class="yourcart">
              <i class="material-icons">&#xe8cc;</i>
              <div>&ThickSpace; YOUR CART</div>
            </div>
            <a class="morecart" href="home.php">
              <i class="material-icons">&#xe854; </i>
              <div>&ThickSpace; ADD MORE?</div>
            </a>
          </div>
            
          <?php while ($item = $result->fetch_assoc()):?>
          <div class="item">
          <div class="image"><img src="data:image/jpeg;base64, <?php echo base64_encode($item['image'])?>" alt=""></div>
          <div class="itemDetails">
          <div class="name"><?php echo $item['name']?></div>
          <div class="gender"><?php echo $item['gender']?></div>
          <div class="size">UK <?php echo $item['itemsize']?></div>
          <div class="price">RM <?php echo $item['price']?></div>
          <div class="discount"><?php if($item['discount']>0)echo $item['discount']."% DISCOUNT" ?></div>
          <div class="quantityBox">
            <label>Quantity: </label>
            <button class="decrement" onclick="decrement(<?php echo $item['id'] ?>,<?php echo $item['itemsize'] ?>, this)">-</button>
            <input class="quantity" id="quantity" type="button" value="<?php echo $item['itemqty']?>" min="1" max="100" disabled>
            <button class="increment" onclick="increment(<?php echo $item['id'] ?>,<?php echo $item['itemsize'] ?>, this)">+</button>
            <button class="remove" onclick="remove(<?php echo $item['id']?>,<?php echo $item['itemsize'] ?>) ">Remove</button>
          </div>
          <div class="totalPerItem">RM <span class="unitprice"><?php echo $item['unitprice']?></span></div>
          <!--pass id to get to remove -->
        </div>
      </div>

        <?php
            endwhile;
          else:?>
            <a class="addcart" href="home.php">
              <i class="material-icons">&#xe854;</i>
              <div>&ThickSpace; NOTHING IN CART? TAKE A LOOK AT OUR HOME PAGE!</div>
            </a>
           <?php endif;
        ?>
    </div>

    <?php if($db->rowCount($getCartSql) > 0){ ?>
    <!--all price calculated automatically-->
    <div class="summary">
    <form action="shop.php" method="post">
        <label for="deliveryAddress">Delivery Address</label>
        <textarea name="deliveryAddress" id="deliveryAddress"><?php echo $address['address']?></textarea>
        <label for="subtotal">Subtotal (RM)</label>
        <input class="subtotal" type="text" name="subtotal" id="subtotal" readonly>
        <label>Delivery Fee (RM)</label>
        <input class="deliveryfee" type="text" name="deliveryfee" id="deliveryfee" readonly>
        <label for="total">Total (RM)</label>
        <input class="totalprice" type="text" name="total" id="total" readonly>
        <button type="button" id="checkout" onclick="checkoutCart()" disabled>Checkout</button>
        <button type="submit" name="checkout" id="submit_checkout" hidden></button>
      </form>
    </div>
    <?php } ?>

    <?php if($db->rowCount($orderSql)>0){ ?>
    <div class="order">
      <div class="yourorder">
        <i class="material-icons">&#xf1cc;</i>
        <div>&ThickSpace; YOUR ORDER HISTORY</div>
      </div>
      
      <?php $orders=$db->fetchAll($orderSql); ?>
      <?php foreach($orders as $row){ ?>
        <div class="eachorder" onclick="showOrderDetails(<?php echo $row['id'] ?>)">
          <div class="orderid"><?php echo $row['id'] ?></div>
          <div class="orderdelivery">
          <i class="material-icons">&#xe558;</i>
          <span class="orderaddress"><?php echo $row['delivery_address'] ?></span>
          </div>
          <div class="ordertotal">RM <?php echo $row['total_price'] ?></div>
        </div>
      <?php } ?>
    </div>
    <?php }else{ ?>
      <a class="moreorder" href="home.php">
      <i class="material-icons">&#xe54c;</i>
      <div>&ThickSpace; NO ORDER? TAKE A LOOK AT OUT HOME PAGE!</div>
    </a>
    <?php } ?>
    <?php }else{ ?>
    <div class="error">
      <i class="material-icons">&#xe14b;</i>
      <div class="words">PLEASE REGISTER OR LOGIN AS A MEMBER TO PROCEED THIS PAGE</div>
    </div>
    <style>
      .content{
        margin: 0;
        padding: 0;
        width: 100%;
        background-color: whitesmoke;
      }

      .error{
        position: absolute;
        top: 70vh;
        width: 100%;
        text-align: center;
        color: red;
        font-family: 'Poppins';
        overflow: hidden;
        justify-content: center;
        display: block;
      }
    </style>
  <?php } ?>
  </div>
  </div> 
  <?php include ('../includes/footer.php') ?>
  <script src="../script/shop.js"></script>
  
</body>
</html>
<?php
session_start();
require_once 'Database.php';
require_once '../includes/checkSession.php';
$db = Database::getInstance();

  if(isset($_GET['orderid'])){
    $orderid=$_GET['orderid'];
    $sql="SELECT * FROM `order_details` WHERE `orderid`='$orderid'";
    $orderedItems=$db->fetchAll($sql);
  }

  if(isset($_POST['review'])){
    $sql="SELECT * FROM `review`";
    $id=$db->rowCount($sql)+1;
    $itemid=$_POST['itemid'];
    $rate=$_POST['rate'];
    $comment=$_POST['comment'];
    $sql="INSERT INTO `review`(`id`, `item_id`, `rate`, `comment`) VALUES ('$id','$itemid','$rate','$comment')";
    $db->exec($sql);

    $orderdetailsid=$_POST['orderdetailsid'];
    $sql="UPDATE `order_details` SET `review`='1' WHERE `id`='$orderdetailsid'";
    $db->exec($sql);
    echo "<meta http-equiv='refresh' content='0'>";
  }
?>

<!DOCTYPE html>
<html>
<head>

  <title>Shopping Cart</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/orderDetailsMan.css">
  <link rel="stylesheet" href="../style/animationBackground.css">
  <?php if($_SESSION['gender']=="F"){ ?>
  <style>
    .eachitem{
      background-color: rgb(255, 235, 235);
    }
  </style>
  <?php } ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  </style>
</head>
<body>
<?php include ('../includes/header_navMenu_burgerMenu.php') ?>
<div class="background">
  <div class="content">
  <?php foreach($orderedItems as $row){ ?>
  <div class="eachitem">
  <?php $orderdetailsid=$row['id']; 
    $itemid=$row['itemid'];
    $itemsize=$row['size'];
    $reviewed=$row['review'];
    $sql="SELECT * FROM `item` WHERE `id`='$itemid'";
    $item=$db->fetch($sql);?>
    <div class="image"><img src="data:image/jpeg;base64, <?php echo base64_encode($item['image'])  ?>" alt=""></div>
    <div class="details">
    <div class="name"><?php echo $item['name'] ?></div>
    <div class="gender"><?php echo $item['gender'] ?></div>
    <div class="size">UK <?php echo $itemsize ?></div>
    <?php if($reviewed==0){ ?>
      <form action="orderDetails.php?orderid=<?php echo $orderdetailsid ?>" method="post">
        <input type="text" name="orderdetailsid" id="orderdetailsid" value="<?php echo $orderdetailsid ?>" hidden>
        <input type="text" name="itemid" id="itemid" value="<?php echo $itemid ?>" hidden>
        <button type="button" class="minus" onclick="minus(this)">-</button>
        <input type="text" class="rate" name="rate" id="rate" value="5" readonly>
        <button type="button" class="add" onclick="add(this)">+</button>
        <input type="text" class="comment" name="comment" id="comment" onchange="validation(this)">
        <button type="submit" class="review" name="review" id="review" disabled>Received & Rate</button>
      </form>
    <?php } ?>
    </div>
    
  </div>
  <?php } ?>
</div>


<?php include ('../includes/footer.php') ?>
<script src="../script/orderDetails.js"></script>
</body>
</html>
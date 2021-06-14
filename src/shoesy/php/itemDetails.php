<?php
        session_start();
        require_once "Database.php";
        $db=Database::getInstance();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            //if id not get from home page, return to home page
            header("location: home.php");
        }

    //SELECT * FROM item WHERE id=1
        $itemDetailsSql = "SELECT * FROM item WHERE id='$id'";
        $item = $db->fetch($itemDetailsSql);

    //SELECT * FROM size WHERE item_id=1
        $sizeChoiceSql = "SELECT * FROM size WHERE item_id='$id'";
        $sizes = $db->fetchAll($sizeChoiceSql);

        $reviewSql = "SELECT * FROM `review` WHERE item_id=$id";
?>

<?php
    //handle add cart

    //if is guest stop adding cart process
    function checkIsMember(){
        $itemid=  $_GET['id'];
        if ($_SESSION['type']=='Guest'){
            echo "<script>alert('Please login first.');window.location.href=\"itemDetails.php?id=$itemid\";</script>";
            return false;
        }
        return true;
    }

    if(isset($_GET['addCart']) || isset($_GET['buyNow'])){

        //if member logged in only can buy
        if(checkIsMember()){
            $memberId = $_SESSION['id'];
            $itemId = $id;
            $itemqty = $_GET['qty'];
            $itemsize = $_GET['size'];

    //    INSERT INTO cart VALUES (1,1, 1,2)
            $addCartSql = "INSERT INTO cart VALUES ($memberId,$itemId, $itemqty,$itemsize)";
            $updateCartSql = "UPDATE cart SET itemqty=itemqty+1 WHERE memberid={$memberId}  AND itemid={$itemId} AND itemsize={$itemsize}";

            // if able to add
            if($db->exec($addCartSql)){

                //if add cart button is selected
                if(isset($_GET['addCart'])){
                    echo "<script>alert('Shoes added.');window.location.href=\"home.php\";</script>";
                }else if($_GET['buyNow']){

                    //go to cart to pay
                    header("location: shop.php");
                }

                //if failed to add
            }
            elseif($db->exec($updateCartSql)){
                if(isset($_GET['addCart'])){
                    echo "<script>alert('Shoes added.');window.location.href=\"home.php\";</script>";
                }else if($_GET['buyNow']){

                    //go to cart to pay
                    header("location: shop.php");
                }

            } 
            else{
                echo "<script>alert('Same shoes existed, please clear your current cart first.');window.location.href=\"itemDetails.php?id=$itemId\";</script>";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>Item Details</title>
    <link rel="stylesheet" href="../style/itemDetails.css">
    <link rel="stylesheet" href="../style/animationBackground.css">
    <?php if($_SESSION['type']!="Guest"){ if($_SESSION['gender']=="M") { ?>
    <style>
        .selected{
            background-color: cyan !important;
        }   
    </style>
    <?php }else if($_SESSION['gender']=="F"){ ?>
    <style>
        .selected{
            background-color: pink !important;
        }   
    </style>
    <?php }} ?>
</head>
<body>
<?php include ('../includes/header_navMenu_burgerMenu.php') ?>
<div class="background">
<div class="content">

    <div class="productDetailBox">
        <div class="productDetailUpper">
            <div class="productImgBox">
                <img src="data:image/jpeg;base64, <?php echo base64_encode($item['image']) ?>" alt="">
            </div>
            <div class="productDetail">
                <div class="name"><?php echo $item['name']?></div>
                <div class="brand"><?php echo $item['brand']?></div>
                <div class="category"><?php echo $item['category']?></div>
                <div class="productPrice"><?php echo 'RM '.$item['price']?> </div>
                <div class="discount"><?php if($item['discount']!=0) echo $item['discount'].'% DISCOUNT'; ?></div>
                <div class="productSizeBox">
                    <div class="sideTitle">
                        Size UK
                    </div>
                    <div class="sizeSelection">
<!--                        a size type-->
                        <div class="sizeBox">
<!--                            use php add size choice-->
                            <?php foreach ($sizes as $size):?>
                            <button class="productSize selectionButton"><?php echo $size['size']?></button>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>

                <div class="quantityBox ">
                    <div class="sideTitle">
                        Quantity
                    </div>
                    <div class="quantitySelection">
                            <button class="minus" type="button" onclick="subtractQuantity()">-</button>
                            <input type="text" name="quantity" id="quantity" value="1" disabled>
                            <button class="add" type="button" onclick="addQuantity()">+</button>
                    </div>
                </div>
                <div class="descriptionBox">
                    <div class="sideTitle">
                        Description
                    </div>
                    <div class="description">
                    <?php echo $item['description']?>
                    </div>
                </div>
                <div class="deliveryBox">
                    <div class="sideTitle">
                        Delivery Information
                    </div>
                    <div class="deliveryType">
                        Shoesy only provides standard delivery option in Malaysia, package will be received within 7 days excluding holidays. 
                        There will be a fixed delivery charge of <b style="color: red;">RM 35</b> for whole Malaysia. Purchasing RM400 or above in an order will be <b style="color: yellowgreen;">FREE</b>.
                    </div>
                </div>
                <div class="returnPolicyBox">
                    <div class="sideTitle">
                        Return Policy
                    </div>
                    <div class="returnContent">
                        Shoesy provides <b style="color: yellowgreen;">FREE RETURN WITHIN 30 DAYS</b> the order had been made. 
                        <b style="color: red;">DELIVERY FEES ARE NOT REFUNDABLE</b> unless you receive an incorrect item. 
                        You can deliver your order attached with the receipt to the following address: No.26G, Jalan Suungai Long 1/2, Bandar SUngai Long, 43000 Kajang, Malaysia. 
                        Once we have received your items at our return center, we will process your return and issue a refund to your original form of payment, usually within 7 working days. We will send you an email to let you know once we issued the refund.
                    </div>
                </div>
                <div class="selection">
                    <button type="button" class="buyButton" value="buy" name="buyBtn" onclick="buyNow()">Buy now</button>
                    <button type="button" class="addButton" value="add" name="addBtn" onclick="addToCart()" >Add To Shopping Lists </button>
                </div>
            </div>
        </div>

    </div>
    <div class="productReview">
        <div class="review">Reviews</div> 

<!--        if got comments-->
        <?php if($db->rowCount($reviewSql)):?>
        <div class="rate"><b>Rate</b></div>
        <div class="comment"><b>Comment</b></div>
        <?php $reviewList = $db->getResult($reviewSql)?>
        <?php while($review = $reviewList->fetch_assoc()):?>
            
        <div class="reviewBox">
            <div class="rate"><?php echo $review['rate']?></div>
            <div class="comment"><?php echo $review['comment']?></div>
            <hr>
        </div>
        <?php endwhile;?>
<!--        if no comments-->
        <?php else: ?>
            <div class="reviewBox">
                <div>No ratings & comments currently.</div>
                <hr>
            </div>
        <?php endif;?>
    </div>
</div>
</div>
<?php include ('../includes/footer.php') ?>
<script>

let itemId = <?php echo $id ?>;
let quantity = 0;
let size = 0;

function getSelectedSize(){
    let selectedSize = document.querySelector(".selected");
    if(selectedSize!=null)
        return selectedSize.innerHTML;
    return null;
}

//use to get size and quantity
function getValue() {
    //get selected size
    let selectedSize = getSelectedSize();

    //get quantity
    let selectedQuantity = document.querySelector('#quantity').value

    size = selectedSize;
    quantity = selectedQuantity;
}


function buyNow(){
    if(getSelectedSize()!=null){
        getValue();
        location.href = "itemDetails.php?buyNow=1&size="+size+"&qty="+quantity+"&id="+itemId;

    }else{
        alert("Size not selected.");
    }
}

function addToCart(){
    if(getSelectedSize()!=null){
        getValue();
        location.href = "itemDetails.php?addCart=1&size="+size+"&qty="+quantity+"&id="+itemId;

    }else{
        alert("Size not selected.");
    }
}


</script>
<script src="../script/itemDetails.js"></script>
<script src="../resources/iconfont/iconfont.js"></script>
</body>
</html>
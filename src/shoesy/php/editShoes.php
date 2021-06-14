<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';
    
    $db=Database::getInstance();

    $sql="SELECT * FROM `item`";
    $shoes=$db->fetchAll($sql);
    $rowCount=$db->rowCount($sql);
    $processedRowCount=strval($rowCount+1);
    while(strlen($processedRowCount)<5){
        $processedRowCount="0".$processedRowCount;
    }

    if(!empty($_POST)){
        if(isset($_POST['submit_add'])){

            $image=addslashes(file_get_contents($_FILES['image_form']['tmp_name']));
            $name=$_POST['name_form'];
            $brand=$_POST['brand_form'];
            $category=$_POST['category_form'];
            $year=$_POST['year_form'];
            $description=$_POST['description_form'];
            $gender=$_POST['gender_form'];
            $price=$_POST['price_form'];
            $discount=$_POST['discount_form'];
            $sql="INSERT INTO `item` VALUES (null,'$image','$name','$brand','$category','$year','$description','$gender','$price','$discount')";
            $db->exec($sql);
            if(!empty($_POST['uk0p5_form'])){
                $size=$_POST['uk0p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk1_form'])){
                $size=$_POST['uk1_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk1p5_form'])){
                $size=$_POST['uk1p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk2_form'])){
                $size=$_POST['uk2_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk2p5_form'])){
                $size=$_POST['uk2p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk3_form'])){
                $size=$_POST['uk3_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk3p5_form'])){
                $size=$_POST['uk3p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk4_form'])){
                $size=$_POST['uk4_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk4p5_form'])){
                $size=$_POST['uk4p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk5_form'])){
                $size=$_POST['uk5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk5p5_form'])){
                $size=$_POST['uk5p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk6_form'])){
                $size=$_POST['uk6_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk6p5_form'])){
                $size=$_POST['uk6p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk7_form'])){
                $size=$_POST['uk7_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk7p5_form'])){
                $size=$_POST['uk7p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk8_form'])){
                $size=$_POST['uk8_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk8p5_form'])){
                $size=$_POST['uk8p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk9_form'])){
                $size=$_POST['uk9_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk9p5_form'])){
                $size=$_POST['uk9p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk10_form'])){
                $size=$_POST['uk10_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk10p5_form'])){
                $size=$_POST['uk10p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk11_form'])){
                $size=$_POST['uk11_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk11p5_form'])){
                $size=$_POST['uk11p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk12_form'])){
                $size=$_POST['uk12_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk12p5_form'])){
                $size=$_POST['uk12p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk13_form'])){
                $size=$_POST['uk13_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk13p5_form'])){
                $size=$_POST['uk13p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk14_form'])){
                $size=$_POST['uk14_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else if(isset($_POST['submit_edit'])){
            $id=$_POST['id_form'];
            $name=$_POST['name_form'];
            $brand=$_POST['brand_form'];
            $category=$_POST['category_form'];
            $year=$_POST['year_form'];
            $description=$_POST['description_form'];
            $gender=$_POST['gender_form'];
            $price=$_POST['price_form'];
            $discount=$_POST['discount_form'];
            if(empty($_FILES['image_form']['tmp_name'])){
                $sql="UPDATE `item` SET `name`='$name', `brand`='$brand', `category`='$category', `year`='$year', `description`='$description', `gender`='$gender', `price`='$price', `discount`='$discount' WHERE `id`='$id'";
                $db->exec($sql);
            }
            else{
                $image=addslashes(file_get_contents($_FILES['image_form']['tmp_name']));
                $sql="UPDATE `item` SET `image`='$image', `name`='$name', `brand`='$brand', `category`='$category', `year`='$year', `description`='$description', `gender`='$gender', `price`='$price', `discount`='$discount' WHERE `id`='$id'";
                $db->exec($sql);
            }
            $sql="DELETE FROM `size` WHERE `item_id`='$id'";
            $db->exec($sql);
            if(!empty($_POST['uk0p5_form'])){
                $size=$_POST['uk0p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk1_form'])){
                $size=$_POST['uk1_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk1p5_form'])){
                $size=$_POST['uk1p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk2_form'])){
                $size=$_POST['uk2_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk2p5_form'])){
                $size=$_POST['uk2p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk3_form'])){
                $size=$_POST['uk3_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk3p5_form'])){
                $size=$_POST['uk3p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk4_form'])){
                $size=$_POST['uk4_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk4p5_form'])){
                $size=$_POST['uk4p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk5_form'])){
                $size=$_POST['uk5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk5p5_form'])){
                $size=$_POST['uk5p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk6_form'])){
                $size=$_POST['uk6_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk6p5_form'])){
                $size=$_POST['uk6p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk7_form'])){
                $size=$_POST['uk7_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk7p5_form'])){
                $size=$_POST['uk7p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk8_form'])){
                $size=$_POST['uk8_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk8p5_form'])){
                $size=$_POST['uk8p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk9_form'])){
                $size=$_POST['uk9_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk9p5_form'])){
                $size=$_POST['uk9p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk10_form'])){
                $size=$_POST['uk10_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk10p5_form'])){
                $size=$_POST['uk10p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk11_form'])){
                $size=$_POST['uk11_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk11p5_form'])){
                $size=$_POST['uk11p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk12_form'])){
                $size=$_POST['uk12_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk12p5_form'])){
                $size=$_POST['uk12p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk13_form'])){
                $size=$_POST['uk13_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk13p5_form'])){
                $size=$_POST['uk13p5_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            if(!empty($_POST['uk14_form'])){
                $size=$_POST['uk14_form'];
                $sql="INSERT INTO `size` (`item_id`,`size`) VALUES ('$id','$size')";
                $db->exec($sql);
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else if(isset($_POST['submit_delete'])){
            $id=$_POST['id_delete'];
            $sql="DELETE FROM `item` WHERE `id`='$id'";
            $db->exec($sql);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Shoesy EDIT SHOES</title>
        <link rel="stylesheet" href="../style/editShoes.css">
        <link rel="stylesheet" href="../style/animationBackground.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
            .navigation a:nth-child(7){
                font-weight: bold;
                color: white;
                border-bottom: 5px solid white;
            }
        </style>
    </head>
    <body>
    <?php if($_SESSION['type']=="Admin"){ ?>
        <?php include ('../includes/header_navMenu_burgerMenu.php') ?>
        <div class="background">
        <div class="content">
            <div class="banner" id="banner">
                <!--Add-->
                <div class="addBanner" id="addBanner" onclick="showForm(this,'Auto Generated','','','','','','','','','','')">
                    <div class="image"><img src="../resources/image/editShoes0.jpg"/></div>
                    <div class="addBar"><h1>ADD A NEW SHOE</h1></div>
                </div>

                <!--Edit Delete-->
                <a class="editBanner" id="editBanner" href="#allShoes">
                    <div class="image"><img src="../resources/image/editShoes1.jpg"/></div>
                    <div class="editBar"><h1>EDIT / DELETE SHOE</h1></div>
                </a>
            </div>

            <!--Add form-->
            <div class="form" id="form">
                <form action="editShoes.php" method="post" enctype="multipart/form-data">
                    <label for="id_form">Shoe ID</label>
                    <input type="text" name="id_form" id="id_form" value="" disabled>
                    <label>Previous Image</label>
                    <img id="currentImage" src="" alt="none">
                    <label>New Image</label>
                    <input type="file" name="image_form" id="image_form" accept="image/*" onchange="validation()" hidden>
                    <label class="chooseImage" for="image_form">choose image</label>
                    <input type="text" class="imageName" id="imageName" value="no image choosen" disabled>
                    <label for="name_form">Name</label>
                    <textarea name="name_form" id="name_form" onchange="validation()" placeholder="alphanumeric characters and common use symbols are available except except quotes"></textarea>
                    <label for="brand_form">Brand</label>
                    <select name="brand_form" id="brand_form" onchange="validation()">
                        <option value="Nike">Nike</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Puma">Puma</option>
                        <option value="Asics">Asics</option>
                        <option value="New Balance">New Balance</option>
                    </select>
                    <label for="category_form">Category</label>
                    <select name="category_form" id="category_form" onchange="validation()">
                        <option value="Casual">Casual</option>
                        <option value="Sport">Sport</option>
                        <option value="Sandal">Sandal</option>
                    </select>
                    <label for="year_form">Year of production</label>
                    <input type="text" name="year_form" id="year_form" onchange="validation()">
                    <label for="description_form">Description</label>
                    <textarea name="description_form" id="description_form" onchange="validation()" placeholder="alphanumeric characters and common use symbols are available except except quotes"></textarea>
                    <label>Gender</label>                    
                    <label class="radioboxLabel" for="male_form"><input type="radio" name="gender_form" id="male_form" value="Male" onchange="validation()" checked>Male</label>                    
                    <label class="radioboxLabel" for="female_form"><input type="radio" name="gender_form" id="female_form" value="Female" onchange="validation()">Female</label>
                    <label>Size</label>
                    <label class="checkboxLabel" for="uk0p5_form"><input type="checkbox" name="uk0p5_form" id="uk0p5_form" value="0.5" onclick="validation()">UK 0.5</label>
                    <label class="checkboxLabel" for="uk1_form"><input type="checkbox" name="uk1_form" id="uk1_form" value="1" onclick="validation()">UK 1</label>                   
                    <label class="checkboxLabel" for="uk1p5_form"><input type="checkbox" name="uk1p5_form" id="uk1p5_form" value="1.5" onclick="validation()">UK 1.5</label>                    
                    <label class="checkboxLabel" for="uk2_form"><input type="checkbox" name="uk2_form" id="uk2_form" value="2" onclick="validation()">UK 2</label>                    
                    <label class="checkboxLabel" for="uk2p5_form"><input type="checkbox" name="uk2p5_form" id="uk2p5_form" value="2.5" onclick="validation()">UK 2.5</label>                    
                    <label class="checkboxLabel" for="uk3_form"><input type="checkbox" name="uk3_form" id="uk3_form" value="3" onclick="validation()">UK 3</label>                    
                    <label class="checkboxLabel" for="uk3p5_form"><input type="checkbox" name="uk3p5_form" id="uk3p5_form" value="3.5" onclick="validation()">UK 3.5</label>                    
                    <label class="checkboxLabel" for="uk4_form"><input type="checkbox" name="uk4_form" id="uk4_form" value="4" onclick="validation()">UK 4</label>                    
                    <label class="checkboxLabel" for="uk4p5_form"><input type="checkbox" name="uk4p5_form" id="uk4p5_form" value="4.5" onclick="validation()">UK 4.5</label>                    
                    <label class="checkboxLabel" for="uk5_form"><input type="checkbox" name="uk5_form" id="uk5_form" value="5" onclick="validation()">UK 5</label>                    
                    <label class="checkboxLabel" for="uk5p5_form"><input type="checkbox" name="uk5p5_form" id="uk5p5_form" value="5.5" onclick="validation()">UK 5.5</label>                    
                    <label class="checkboxLabel" for="uk6_form"><input type="checkbox" name="uk6_form" id="uk6_form" value="6" onclick="validation()">UK 6</label>                    
                    <label class="checkboxLabel" for="uk6p5_form"><input type="checkbox" name="uk6p5_form" id="uk6p5_form" value="6.5" onclick="validation()">UK 6.5</label>                    
                    <label class="checkboxLabel" for="uk7_form"><input type="checkbox" name="uk7_form" id="uk7_form" value="7" onclick="validation()">UK 7</label>                    
                    <label class="checkboxLabel" for="uk7p5_form"><input type="checkbox" name="uk7p5_form" id="uk7p5_form" value="7.5" onclick="validation()">UK 7.5</label>                    
                    <label class="checkboxLabel" for="uk8_form"><input type="checkbox" name="uk8_form" id="uk8_form" value="8" onclick="validation()">UK 8</label>                    
                    <label class="checkboxLabel" for="uk8p5_form"><input type="checkbox" name="uk8p5_form" id="uk8p5_form" value="8.5" onclick="validation()">UK 8.5</label>                    
                    <label class="checkboxLabel" for="uk9_form"><input type="checkbox" name="uk9_form" id="uk9_form" value="9" onclick="validation()">UK 9</label>                    
                    <label class="checkboxLabel" for="uk9p5_form"><input type="checkbox" name="uk9p5_form" id="uk9p5_form" value="9.5" onclick="validation()">UK 9.5</label>                    
                    <label class="checkboxLabel" for="uk10_form"><input type="checkbox" name="uk10_form" id="uk10_form" value="10" onclick="validation()">UK 10</label>                    
                    <label class="checkboxLabel" for="uk10p5_form"><input type="checkbox" name="uk10p5_form" id="uk10p5_form" value="10.5" onclick="validation()">UK 10.5</label>                    
                    <label class="checkboxLabel" for="uk11_form"><input type="checkbox" name="uk11_form" id="uk11_form" value="11" onclick="validation()">UK 11</label>                    
                    <label class="checkboxLabel" for="uk11p5_form"><input type="checkbox" name="uk11p5_form" id="uk11p5_form" value="11.5" onclick="validation()">UK 11.5</label>                    
                    <label class="checkboxLabel" for="uk12_form"><input type="checkbox" name="uk12_form" id="uk12_form" value="12" onclick="validation()">UK 12</label>                    
                    <label class="checkboxLabel" for="uk12p5_form"><input type="checkbox" name="uk12p5_form" id="uk12p5_form" value="12.5" onclick="validation()">UK 12.5</label>                    
                    <label class="checkboxLabel" for="uk13_form"><input type="checkbox" name="uk13_form" id="uk13_form" value="13" onclick="validation()">UK 13</label>                    
                    <label class="checkboxLabel" for="uk13p5_form"><input type="checkbox" name="uk13p5_form" id="uk13p5_form" value="13.5" onclick="validation()">UK 13.5</label>                    
                    <label class="checkboxLabel" for="uk14_form"><input type="checkbox" name="uk14_form" id="uk14_form" value="14" onclick="validation()">UK 14</label>
                    <label for="price_form">Price (RM)</label>
                    <input type="text" name="price_form" id="price_form" onchange="validation()"" placeholder="exp: 500.00">
                    <label for="discount_form">Discount (%)</label>
                    <input type="text" name="discount_form" id="discount_form" onchange="validation()" placeholder="exp: 20">
                    <div>
                        <input type="button" id="cancel_form" onclick="cancelEdit(this)" value="Cancel">
                        <button type="reset" id="reset_form" hidden></button>
                        <button type="submit" id="submit_form" onclick="closeForm(this)" disabled>Add</button>
                    </div>
                </form>
            </div>

            <!--Delete-->
            <div class="delete_form">
                <form action="editShoes.php" method="post">
                    <input type="text" name="id_delete" id="id_delete">
                    <button type="submit" name="submit_delete" id="submit_delete">Delete</button>
                </form>
            </div>

            <!--All shoes-->
            <div class="allShoes" id="allShoes">
                <table>
                    <tr>
                        <th>NO.</th>
                        <th>SHOES ID</th>
                        <th>NAME</th>
                        <th>GENDER</th>
                        <th>PRICE (RM)</th>
                        <th>DISCOUNT (%)</th>
                        <th></th>
                        <th></th>
                    </tr>
                   
                    <?php $shoeNO=1;
                    foreach ($shoes as $row) { ?>
                        
                    <tr id='<?php $row['id'] ?>'>
                        <td class="shoeNo"><div><?php echo $shoeNO++ ?>.</div></td>
                        <td class="shoeId"><div><?php echo $row['id'] ?></div></td>
                        <td class="name"><div><?php echo $row['name'] ?></div></td>
                        <td class="gender"><div><?php echo $row['gender'] ?></div></td>
                        <td class="price"><div><?php echo $row['price'] ?></div></td>
                        <td class="discount"><div><?php echo $row['discount'] ?></div></td>
                        <?php 
                            $id=$row['id'];
                            $sql="SELECT * FROM `size` WHERE `item_id`='$id'";
                            $sizes=$db->fetchAll($sql);
                            $count=$db->rowCount($sql);
                            $sizeArray=array();
                            for($i=0;$i<$count;$i++){
                                $sizeArray[$i]=$sizes[$i]['size'];
                            }
                        ?>
                        <script>var sizeArray<?php echo $id ?>= <?php echo json_encode($sizeArray) ?>;</script>
                        <td class="delete" onclick="deleteShoe('<?php echo $row['id'] ?>')">Delete</td>
                        <td class="edit"  onclick="showForm(this,'<?php echo $row['id'] ?>','<?php echo base64_encode($row['image']) ?>','<?php echo $row['name'] ?>','<?php echo $row['brand'] ?>','<?php echo $row['category'] ?>','<?php echo $row['year'] ?>','<?php echo $row['description'] ?>','<?php echo $row['gender'] ?>',sizeArray<?php echo $row['id'] ?>,'<?php echo $row['price'] ?>','<?php echo $row['discount'] ?>')">Edit</td>
                    </tr>
                    <?php } ?>
                </table>             
            </div>
        </div>
        </div>
    <?php include ('../includes/footer.php') ?>
    <script src="../script/editShoes.js"></script>
    <?php }else{ ?>
        <div class="error">
            <i class="material-icons">&#xe14b;</i>
            <p>YOU ARE NOT ALLOW TO ACCESS THIS PAGE</p>
        </div>
        <style>
            .error{
                background-color: whitesmoke;
                height: 100vh;
                width: 100vw;
                text-align: center;
                color: red;
                font-family: 'Poppins';
                overflow: hidden;
            }

            .material-icons{
                margin-top: 50vh;
                display: block;
            }
        </style>
    <?php } ?>
    </body>
</html>
<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';

    $db=Database::getInstance();

    //first get all items from database
    $sql = "SELECT * FROM item";

    //Used to filter search---------
    //function use to parse filter sql
    function parseFilter ($filterList ): string {
        $filters = $filterList;
        $tempSql = "(";
        foreach ($filters as $filter){
            $tempSql.="'".$filter."',";
        }
        //delete one last ,
        $tempSql = substr($tempSql, 0,-1);
        $tempSql .= ")";
        return $tempSql;
    }

    //filter options
    if(isset($_POST['filterBtn'])){

        $categorySql = "";
        $brandsSql = "";
        $genderSql = "";
        $yearSql = "";


        if(isset($_POST['shoesCategories'])){
            $shoesCategories=$_POST['shoesCategories'];

            $categorySql = "`category` IN";
            $categorySql .= parseFilter($_POST['shoesCategories']);
        }

        if(isset($_POST['shoesBrand'])){
            $shoesBrand=$_POST['shoesBrand'];

            $brandsSql = "`brand` IN";
            $brandsSql .= parseFilter($_POST['shoesBrand']);
        }
        if(isset($_POST['shoesGender'])){
            $shoesGender=$_POST['shoesGender'];

            $genderSql = "`gender` IN";
            $genderSql .= parseFilter($_POST['shoesGender']);
        }
        if(isset($_POST['shoesYear'])){
            $shoesYear=$_POST['shoesYear'];

    //        SELECT * FROM item WHERE `year` BETWEEN 2000 AND 2005 OR `year` BETWEEN 2005 AND 2010
            $yearSql = "`year` BETWEEN ";
            $tempSql = "";
            foreach ($_POST['shoesYear'] as $year){
                $yearBetween = $year - 5;

                $tempSql.=$yearBetween.' AND '.$year.' OR `year` BETWEEN ';
            }
            //delete one last OR
            $tempSql = substr($tempSql, 0,-19);
            $yearSql .= $tempSql;
        }

        //if filter is set only execute search
        if($categorySql != ""|| $brandsSql != ""|| $genderSql != ""|| $yearSql != ""){
            $filterSqlArr = array($categorySql,$brandsSql,$genderSql,$yearSql);
            $parseFilterSql = ' WHERE';
            foreach ($filterSqlArr as $singleFilter) {
                if($singleFilter != ""){
                    $parseFilterSql.=$singleFilter." AND ";
                }
            }
            //delete the last end
            $parseFilterSql = substr($parseFilterSql, 0 , -4);
            $sql .= " $parseFilterSql";
        }
    }
    //Used to filter search--------- END

?>
<?php
    if(isset($_POST['sortType'])){
        $sortType = $_POST['sortType'];
        switch ($sortType){
            default:
                break;
            case "year":
                $sql .= " ORDER BY year DESC";
                break;
            case "highToLow":
                $sql .= " ORDER BY price DESC";
                break;
            case "lowToHigh":
                $sql .= " ORDER BY price ASC";
                break;
            case "discount":
                $sql .= " ORDER BY discount DESC";
                break;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>Shoesy Home</title>
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/animationBackground.css">
    <?php if($_SESSION['type']!="Guest"){ if($_SESSION['gender']=="M") { ?>
    <link rel="stylesheet" href="../style/homeMan.css">
    <?php }else if($_SESSION['gender']=="F"){ ?>
    <link rel="stylesheet" href="../style/homeWoman.css">
    <?php }} ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap');
        .navigation a:nth-child(1){
        font-weight: bold;
        color: white;
        border-bottom: 5px solid white;
    }
    </style>
</head>

<body >
    <?php include ('../includes/header_navMenu_burgerMenu.php') ?>
    <div class="background">
        <div class="content">
            <div class="image">
                <img src="../resources/image/home.jpg" alt="">
                <div class="typewriter1"><h1>Welcome To</h1></div>
                <div class="typewriter2"><h1>SHOESY</h1></div>
                <a class="shopnow" href="#dashboardPage">SHOP NOW</a>
            </div>


            <div id="dashboardPage">

                <div class="sideFilter">
                    <div class="filterTitle">
                        <i class="material-icons">&#xef4f;</i>
                        <h3>&ThickSpace; Filter</h3>
                    </div>
                    <form action="home.php" method="post">
                        <div class="filterBox">
                            <div class="filterName">
                                <b>Shoe's categories</b>
                            </div>
                            <div class="filterOptions">
                                <label>
                                    <input type="checkbox" value="Casual" name="shoesCategories[]" <?php if (isset($shoesCategories) && in_array("Casual", $shoesCategories)) echo "checked";?>>
                                    Casual
                                </label>
                                <label>
                                    <input type="checkbox" value="Sport" name="shoesCategories[]"  <?php if (isset($shoesCategories) && in_array("Sport", $shoesCategories)) echo "checked";?>>
                                    Sport
                                </label>
                                <label>
                                    <input type="checkbox" value="Sandal" name="shoesCategories[]" <?php if (isset($shoesCategories) && in_array("Sandal", $shoesCategories)) echo "checked";?>>
                                    Sandals
                                </label>
                            </div>
                        </div>
                        <div class="filterBox">
                            <div class="filterName">
                                <b>Brands</b>
                            </div>
                            <div class="filterOptions">
                                <label>
                                    <input type="checkbox" value="Adidas" name="shoesBrand[]" <?php if (isset($shoesBrand) && in_array("Adidas", $shoesBrand)) echo "checked";?>>
                                    Adidas
                                </label>
                                <label>
                                    <input type="checkbox" value="Nike" name="shoesBrand[]" <?php if (isset($shoesBrand) && in_array("Nike", $shoesBrand)) echo "checked";?>>
                                    Nike
                                </label>
                                <label>
                                    <input type="checkbox" value="NewBalance" name="shoesBrand[]" <?php if (isset($shoesBrand) && in_array("NewBalance", $shoesBrand)) echo "checked";?>>
                                    New Balance
                                </label>
                                <label>
                                    <input type="checkbox" value="Puma" name="shoesBrand[]" <?php if (isset($shoesBrand) && in_array("Puma", $shoesBrand)) echo "checked";?>>
                                    Puma
                                </label>
                            </div>
                        </div>
                        <div class="filterBox">
                            <div class="filterName">
                                <b>Gender</b>
                            </div>
                            <div class="filterOptions">
                                <label>
                                    <input type="checkbox" value="Male" name="shoesGender[]"  <?php if (isset($shoesGender) && in_array("Male", $shoesGender)) echo "checked";?>>
                                    Male
                                </label>
                                <label>
                                    <input type="checkbox" value="Female" name="shoesGender[]" <?php if (isset($shoesGender) && in_array("Female", $shoesGender)) echo "checked";?>>
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="filterBox">
                            <div class="filterName">
                                <b>Year of Production</b>
                            </div>
                            <div class="filterOptions">
                                <label>
                                    <input type="checkbox" value="2005" name="shoesYear[]" <?php if (isset($shoesYear) && in_array("2005", $shoesYear)) echo "checked";?>>
                                    2000-2005
                                </label>
                                <label>
                                    <input type="checkbox" value="2010" name="shoesYear[]" <?php if (isset($shoesYear) && in_array("2010", $shoesYear)) echo "checked";?>>
                                    2005-2010
                                </label>
                                <label>
                                    <input type="checkbox" value="2015" name="shoesYear[]" <?php if (isset($shoesYear) && in_array("2015", $shoesYear)) echo "checked";?>>
                                    2010-2015
                                </label>
                                <label>
                                    <input type="checkbox" value="2021" name="shoesYear[]" <?php if (isset($shoesYear) && in_array("2021", $shoesYear)) echo "checked";?>>
                                    2015-2021
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="sortType" id="sortType" value="none">
                        <button type="submit" value="filterBtn" name="filterBtn" id="filterBtn">Search</button>
                        <button type="reset" id="resetButton" onclick="resetCheckbox(this)">Clear</button>
                    </form>
                </div>
                <div class="shoesPane">
                    <div class="topBar">
                        <div class="sortList">
                            <label>
                                <div class="sortby">
                                    <i class="material-icons">&#xe164;</i>
                                    <div>&ThickSpace; Sort By:</div>
                                </div>
                                <select name="sortType" onchange="document.forms[0].elements[13].value = this.value; document.getElementsByName('filterBtn').item(0).click();">
                                    <option value="none">None</option>
                                    <option value="year" <?php if (isset($sortType) && $sortType=='year') echo 'selected';?>>Year of the product's model (Newest to Oldest)</option>
                                    <option value="highToLow" <?php if (isset($sortType) && $sortType=='highToLow') echo 'selected'; ?>>Price: High to Low</option>
                                    <option value="lowToHigh" <?php if (isset($sortType) && $_POST['sortType']=='lowToHigh') echo 'selected'; ?>>Price: Low to High</option>
                                    <option value="discount" <?php if (isset($sortType) && $sortType=='discount') echo 'selected'; ?>>Discount (High to Low)</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="shoesGrid" id="shoesGrid">
                        <!--            use to test one item-->
                        <!--            --><?php //$item = $items[0]?>
                        <!--            <div class="itemDetails" onclick="'itemDetails.php?id='--><?php //echo $item['id'] ?><!--">-->
                        <!--                <img class="itemImage" src="data:image/jpeg;base64, --><?php //echo base64_encode($item['image'])?><!--" alt="">-->
                        <!--                <span class="itemName">--><?php //echo $item['name']?><!--</span>-->
                        <!--                <span class="itemBrand">--><?php //echo $item['brand']?><!--</span>-->
                        <!--                <span class="itemPrice">RM --><?php //echo $item['price']?><!--</span>-->
                        <!--                <span class="itemReview">5 star</span>-->
                        <!--            </div>-->

                        <?php $result = $db->getResult($sql) ?>
                        <?php while($item = $result->fetch_assoc()){?>
                            <div class="itemDetails" onclick="location.href = 'itemDetails.php?id=<?php echo $item['id'] ?>'">
                                <img class="itemImage" src="data:image/jpeg;base64, <?php echo base64_encode($item['image'])?>" alt="">
                                <span class="itemName"><?php echo $item['name']?></span>
                                <span class="itemPrice">RM <?php echo $item['price']?></span>
                            </div>
                        <?php }?>
                        <!--            use to show discount if want-->
                        <!--            <span >--><?php //echo $items[$i]['discount']==0?"":$items[$i]['discount']; ?><!--</span>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ('../includes/footer.php') ?>
    <script src="../script/home.js"></script>
</body>
</html>
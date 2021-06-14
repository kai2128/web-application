<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';
    
    $db=Database::getInstance();

    $sql="SELECT * FROM `faq` WHERE `category`='Dispatch & Delivery'";
    $dispatchAndDelivery=$db->fetchAll($sql);
    $sql="SELECT * FROM `faq` WHERE `category`='Returns'";
    $returns=$db->fetchAll($sql);
    $sql="SELECT * FROM `faq` WHERE `category`='Orders'";
    $orders=$db->fetchAll($sql);
    $sql="SELECT * FROM `faq` WHERE `category`='Product Info'";
    $productInfo=$db->fetchAll($sql);

    //Search keyword in existing database table
    if(!empty($_POST)){
        $search=$_POST['search'];
        $sql="SELECT * FROM `faq` WHERE `category` LIKE '%$search%' OR `question` LIKE '%$search%' OR `answer` LIKE '%$search%'";
        $searchResult=$db->fetchAll($sql);
        $_POST = array();
    }
?>

<!doctype html>
<html>
    <head>
      
        <title>Shoesy FAQ</title>
        <link rel="stylesheet" href="../style/animationBackground.css">
        <link rel="stylesheet" href="../style/faq.css">
        <?php if($_SESSION['type']!="Guest"){ if($_SESSION['gender']=="M") { ?>
        <link rel="stylesheet" href="../style/faqMan.css">
        <?php }else if($_SESSION['gender']=="F"){ ?>
        <link rel="stylesheet" href="../style/faqWoman.css">
        <?php }} ?>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
            .navigation a:nth-child(3){
                font-weight: bold;
                color: white;
                border-bottom: 5px solid white;
            }
        </style>
    </head>
    <body>
        <?php include ('../includes/header_navMenu_burgerMenu.php') ?>

        <div class="background">
            <div class="content">
            
                <!--Search-->
                <div class="search">
                    <div class="image"><img src="../resources/image/faq.png"/></div>
                    <form class="searchBar" action="faq.php" method="post">
                        <h1>WHAT CAN WE HELP YOU ?</h1>
                        <input type="text" id="search" name="search" placeholder="Search...">
                    </form>
                </div>

                <!--4 category FAQ-->
                <div class="faq">
                    <div class="category">
                        <div class="categoryName" id="dispatchAndDelivery" onclick="toggleQuestion(id)">
                            Dispatch & Delivery <label>+</label>
                        </div>
                        <!--Display all FAQ under this category-->
                        <div class="allQuestions">
                            <?php foreach ($dispatchAndDelivery as $row) { ?>
                                <div class="question" id='<?php echo $row['id'] ?>' onclick="toggleAnswer(this.id)">
                                    <?php echo $row['question'] ?>
                                    <label>+</label>
                                </div>
                                <label class="answer"><?php echo $row['answer'] ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="category">
                        <div class="categoryName" id="returns"  onclick="toggleQuestion(id)">
                            Returns
                            <label>+</label>
                        </div>
                        <div class="allQuestions">
                            <?php foreach ($returns as $row) { ?>
                            <div class="question" id='<?php echo $row['id'] ?>' onclick="toggleAnswer(this.id)">
                                <?php echo $row['question'] ?>
                                <label>+</label>
                            </div>
                            <label class="answer"><?php echo $row['answer'] ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="category">
                        <div class="categoryName" id="orders"  onclick="toggleQuestion(id)">
                            Orders
                            <label>+</label>
                        </div>
                        <div class="allQuestions">
                            <?php foreach ($orders as $row) { ?>
                            <div class="question" id='<?php echo $row['id'] ?>' onclick="toggleAnswer(this.id)">
                                <?php echo $row['question'] ?>
                                <label>+</label>
                            </div>
                            <label class="answer"><?php echo $row['answer'] ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="category">
                        <div class="categoryName" id="productInfo"  onclick="toggleQuestion(id)">
                            Product Info
                            <label>+</label>
                        </div>
                        <div class="allQuestions">
                            <?php foreach ($productInfo as $row) { ?>
                            <div class="question" id='<?php echo $row['id'] ?>' onclick="toggleAnswer(this.id)">
                                <?php echo $row['question'] ?>
                                <label>+</label>
                            </div>
                            <label class="answer"><?php echo $row['answer'] ?></label>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <?php include ('../includes/footer.php') ?>
        
        <script src="../script/faq.js"></script>
        <?php 
            if(!empty($searchResult)){
                $searchDispatchAndDelivery=false;
                $searchReturns=false;
                $searchOrders=false;
                $searchProductInfo=false;
                foreach($searchResult as $row){
                    if($row['category']=='Dispatch & Delivery'){
                        $searchDispatchAndDelivery=true;
                    }
                    else if($row['category']=='Returns'){
                        $searchReturns=true;
                    }
                    else if($row['category']=='Orders'){
                        $searchOrders=true;
                    }
                    else if($row['category']=='Product Info'){
                        $searchProductInfo=true;
                    }
                }
                if($searchDispatchAndDelivery==true){ ?>
                    <script>document.getElementById("dispatchAndDelivery").click();</script>
                <?php }if($searchReturns==true){ ?>
                    <script>document.getElementById("returns").click();</script>
                <?php }if($searchOrders==true){ ?>
                    <script>document.getElementById("orders").click();</script>
                <?php }if($searchProductInfo==true){ ?>
                    <script>document.getElementById("productInfo").click();</script>
                <?php }foreach($searchResult as $row){ ?>
                    <script>document.getElementById("<?php echo $row['id'] ?>").click();</script>
                <?php } 
            }
        
         ?>
    </body>
</html>
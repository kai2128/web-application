<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';
    $db = Database::getInstance();
    //receive blog id as parameter after user select a blog
    $id=$_GET['id'];
    $sql="SELECT*FROM `blog` WHERE id={$id}";
    $blog=$db->fetch($sql);

?>

<!doctype html>
<html>

<head>
 
    <title>Shoesy blog</title>
    <link rel="stylesheet" href="../style/blog.css">
    <link rel="stylesheet" href="../style/animationBackground.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--womanish and manish design-->
    <style>    
        <?php if($_SESSION['type']!="Guest"){ if($_SESSION['gender']=="M"){ ?>
        
            .socialmediabutton a:hover{
                background-color: lightcyan;
            }      
        <?php }else if($_SESSION['gender']=="F"){ ?>
     
            .socialmediabutton a:hover{
                background-color: rgb(255, 235, 235);
            }
            <?php }}?>
    </style>
        
</head>

<body>
    <?php include ('../includes/header_navMenu_burgerMenu.php') ?>
    <div class="background">
        <div class="content">
            <div id="blogPage" >
                <!--Display blog content from database-->
                <div class="blogTitle"><?php echo $blog['title'];?></div>
                <div class="image"><?php echo '<img src="data:image/jpg;base64,'.base64_encode($blog['cover']). '"/>';?></div>  
                            <div class="blogCaption">
                                <span><?php echo $blog['category'];?></span>
                                <span><?php echo $blog['author'];?></span>
                                <span><?php echo $blog['date'];?></span>
                            </div>
                <div class="blogContentBox">
                            <div class="sec">
                                <div>Introduction</div>
                                <div class="words"><?php echo $blog['intro'];?></div>
                            </div>
                            <div class="sec">
                                <div>Main Content</div>
                                <div class="words"><?php echo $blog['main_content'];?></div>
                            </div>

                            <div class="sec">

                                <?php if($blog['media']!=NULL)
                                {
                                    echo '<img class="media" src="data:image/jpg;base64,'.base64_encode($blog['media']).'""/>';
                                }
                                ?>
                            </div>

                            <div class="sec">
                                <div><?php echo $blog['sub_head'];?></div>
                                <div class="words"><?php echo $blog['sub_content'];?></div>
                            </div>
                            <div class="sec">
                                <div>Conclusion</div>
                                <div class="words"><?php echo $blog['conclusion'];?></div>
                            </div>
                        </div>
                <div class="socialmediabutton">
                            <a href="https://www.facebook.com/"><img src="../resources/image/fb.png" alt=""></a>
                            <a href="https://www.instagram.com/"><img src="../resources/image/ig.png" alt=""></a>
                            <a href="https://twitter.com/"><img src="../resources/image/tw.png" alt=""></a>
                </div>
            </div>
        </div>   
    </div> 
        <?php include ('../includes/footer.php') ?>
</body>

</html>
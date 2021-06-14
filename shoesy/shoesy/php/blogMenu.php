<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';
    
    $db=Database::getInstance();
    //select summary info of blog from database
    $sql="SELECT `id`,`title`,`category`, `author`, `date`, `intro`,`cover`FROM `blog`";
    $arr=$db->fetchAll($sql);
?>

<!doctype html>
<html>
<head>

    <title>Shoesy Blog</title>
    <link rel="stylesheet" href="../style/blogMenu.css">
    <link rel="stylesheet" href="../style/animationBackground.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        .navigation a:nth-child(6){
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
                <!--Display blog summary from database-->
                <?php foreach($arr as $blog):?>
                    <a class="blogGrid" href="<?php echo "blog.php?id=".$blog['id']; ?>">
                    <div class="blogImg"><?php echo '<img src="data:image/jpg;base64,'.base64_encode($blog['cover']). '"/>';?></div>    
                    <div class="blogTitle"><?php echo $blog['title'];?></div>
                    <div class="category"><?php echo $blog['category'];?></div>
                    <div class="blogAuthor"><?php echo $blog['author'];?></div>
                    <div class="blogDate"><?php echo $blog['date'];?></div>
                    <div class="blogShortIntro"><?php echo $blog['intro'];?>...</div>
                    </a>
                <?php endforeach; ?>
    </div>
</div>
<?php include ('../includes/footer.php') ?>
</body>
</html>

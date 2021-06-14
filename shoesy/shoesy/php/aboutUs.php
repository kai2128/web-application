<?php
    session_start();
    require_once '../includes/checkSession.php';
?>

<!doctype html>
<html>
    <head>
        <title>Shoesy About</title>
        <link rel="stylesheet" href="../style/aboutUs.css">
        <link rel="stylesheet" href="../style/animationBackground.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
            .navigation a:nth-child(4){
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
                <div class="image">
                    <img src="../resources/image/aboutus.jpg" alt="">
                    <div class="banner">About Shoesy</div> 
                    <div class="words">
                    Established in the year 2020 by a group of passionate shoes' lovers, Siang Wei, Kai En, Yu Hang and Chieh Ning. 
                    Shoesy started with an online retailer store without any physical store. As the founders of Shoesy trusted that 
                    we are on the ecommerce-era, we will deliver your orders to hour address without you for your convinient, what 
                    you need to do is just keep following our Shoesy online store for any promotion or sales! Shoesy promises to 
                    provide our dearest customers the most reliable prices for every single pair of shoes with quality assurance and brand 
                    recognition.
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../includes/footer.php') ?>
    </body>
</html>
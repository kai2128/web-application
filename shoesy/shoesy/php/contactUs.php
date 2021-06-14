<?php
    session_start();
    require_once '../includes/checkSession.php';
?>


<!doctype html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="../style/contactUs.css">
    <link rel="stylesheet" href="../style/animationBackground.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        .navigation a:nth-child(5){
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
                <img src="../resources/image/contactus.jpg" alt="">
                <div class="banner">Contact Shoesy</div>
                <div class="section1">
                    <i class="material-icons">&#xe0be;</i>
                    <div>shoesy00@gmail.com</div>
                </div>
                <div class="section2">
                    <i class="material-icons">&#xe0b0;</i>
                    <div>03-8069157</div>
                </div>
                <div class="section3">
                    <i class="material-icons">&#xe0c8;</i>
                    <div>No.26G, Jalan Suungai Long 1/2, Bandar SUngai Long, 43000 Kajang, Malaysia.</div>
                </div>
                <div class="section4">
                    <i class="material-icons">&#xe8b5;</i>
                    <div>10.00AM - 8.00PM</div>
                </div>

                <div class="message">
                    <div class="banner1">
                        <i class="material-icons">&#xe151;</i>
                        <div>SEND US AN EMAIL</div> 
                    </div> 
                    <form action="mailto:shoesy00@gmail.com">
                        <label for="myname">Name</label>
                        <input type="text" id="myname" onchange="validation()" >
                        <label for="email">Email</label>
                        <input type="text" id="email" onchange="validation()"  >
                        <label for="message">Message</label>
                        <textarea id="message"></textarea>
                        <input type="submit" disabled id="submit">
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <?php include ('../includes/footer.php') ?>
    <script src="../script/contactUs.js"></script>

</body>
</html>
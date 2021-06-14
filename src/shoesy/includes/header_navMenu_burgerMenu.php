<!doctype html>
<html>
    <head>
        <style class="link">
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        </style>
        <style class="element">
            *{
                font-family: 'Poppins';
            }

            .header{
                background-color: whitesmoke;
            }

            .logo{
                text-align: center;
            }

            .logo img{
                height: 150px;
            }


            .logout a{
                position: absolute;
                top: 10px;
                right: 10px;
                text-decoration: none;
                color: black;
                cursor: pointer;

   
            }

            .logout a:hover{
                color: red;
            }
            .signup a{
                position: absolute;
                top: 10px;
                right: 80px;
                text-decoration: none;
                color: black;
                cursor: pointer;
   
             
            }

            .signup a:hover{
                color: yellowgreen;
            }

            .login a{
                position: absolute;
                top: 10px;
                right: 10px;
                text-decoration: none;
                color: black;
                cursor: pointer;
            }

            .login a:hover{
                color: green;
            }

            .navigation{
                display: flex;
                justify-content: center;
                width: 100%;
                height: 6vh;
                list-style-type: none;
                overflow: hidden;
                background-color: lightgray;
                text-align: center;
            }

            .navigation a{
                display: block;
                text-decoration: none;
                padding: 1vh 1vw 1vh 1vw;
                width: 10vw;
                text-align: center;
                color: black;
                float: left;
            }

            .navigation a:hover{
                border-bottom: 5px solid darkgray;
            }
                   
            .burgerIcon{
                position: absolute;
                display: flex;
                padding: 0.5vw;
                width: 2vw;
                font-size: 1rem;
                justify-content: space-evenly;
                cursor: pointer;
                background-color: whitesmoke;
                border-top-right-radius: 30%;
                border-bottom-right-radius: 30%;
                z-index: 1;
            }

            .burgerIcon:hover{
                background-color: lightgray;
                font-weight: bold;
                color: white;
            }

            .sideMenu{
                display: flex;
                flex-direction: column;
                background-color: whitesmoke;
                position: absolute;
                left: -15vw;
                height: 100vh;
                width: 15vw;
                z-index: 1;
                transition: all 1s;
            }

            .sideMenu a{
                display: block;
                text-decoration: none;
                padding: 0.5vh 1vw 0.5vh 1vw;
                text-align: left;
                color: black;
                font-size: 1rem;
                cursor: pointer;
            }

            .sideMenu a:hover{
                background-color: lightgray;
                color: white;
                font-weight: bold;
            }

            .sideMenu a:first-child{
                text-align: right;
            }

            .sticky{
                position: fixed;
                top: 0vh;
            }

            .showSideMenu{
                left: 0vw;
            }
        </style>
        <style class="php">

            <?php if($_SESSION['gender']=="M"){ ?>
                .navigation{
                    background-color: cyan;
                }
                .navigation a:hover{
                    border-bottom: 5px solid rgb(135,206,250);
                    }
                .burgerIcon:hover{
                    background-color: cyan;
                }
                .sideMenu a:hover{
                    background-color: cyan;
                }
            <?php }else if($_SESSION['gender']=="F"){ ?>
                .navigation{
                    background-color: pink;
                }
                .navigation a:hover{
                    border-bottom: 5px solid lightcoral;
                    }
                .burgerIcon:hover{
                    background-color: pink;
                }
                .sideMenu a:hover{
                    background-color: pink;
                }
            <?php } ?>
        </style>
    </head>
    <body>
  
        <div class="header">
            <div class="logo">
                <img src="../resources/image/logo1.png" />
            </div>
            <div class="logout" id="logout" >
                <a onclick="logout()">Log Out</a>
            </div>
            <div class="signup" id="signup">
                <a onclick="signup()">Sign Up</a>
            </div>
            <div class="login" id="login">
                <a onclick="login()">Login In</a>
            </div>
        </div>

        <div class="navigation">
            <a href="../php/home.php">Home</a>
            <a href="../php/shop.php">Cart</a>
            <a href="../php/faq.php">FAQ</a>
            <a href="../php/aboutUs.php">About Us</a>
            <a href="../php/contactUs.php">Contact Us</a>
            <a href="../php/blogMenu.php">Blog</a>
            <a id="naveditShoes" href="../php/editShoes.php">Edit Shoes</a>
            <a id="naveditFAQ" href="../php/editFaq.php">Edit FAQ</a>
        </div>

        <div class="burgerIcon" id="burgerIcon" onclick="showSideMenu()">☰</div>
    
        <div class="sideMenu" id="sideMenu">
            <a onclick="hideSideMenu()">✕</a>
            <a href="../php/home.php">Home</a>
            <a href="../php/shop.php">Cart</a>
            <a href="../php/faq.php">FAQ</a>
            <a href="../php/aboutUs.php">About Us</a>
            <a href="../php/contactUs.php">Contact Us</a>
            <a href="../php/blogMenu.php">Blog</a>
            <p></p>
            <a id="editShoes" href="../php/editShoes.php">Edit Shoes</a>
            <a id="editFAQ" href="../php/editFaq.php">Edit FAQ</a>
        </div>

        <script>
            var sideMenu = document.getElementById("sideMenu");
            var burgerIcon = document.getElementById("burgerIcon");
            var stickyBI = burgerIcon.offsetTop;
            var sideMenu = document.getElementById("sideMenu");
            var stickySM = sideMenu.offsetTop;
            var editShoes=document.getElementById("editShoes");
            var editFAQ=document.getElementById("editFAQ");
            var naveditShoes=document.getElementById("naveditShoes");
            var naveditFAQ=document.getElementById("naveditFAQ");
            var logoutbutton=document.getElementById("logout");
            function showSideMenu(){
                sideMenu.classList.add("showSideMenu");
            }
            function hideSideMenu(){
                sideMenu.classList.remove("showSideMenu");
            }
          
            window.onscroll = function(){
                if (window.pageYOffset >= stickyBI) {
                    burgerIcon.classList.add("sticky")
                } 
                else {
                    burgerIcon.classList.remove("sticky");
                }
                if (window.pageYOffset >= stickySM) {
                    sideMenu.classList.add("sticky")
                } 
                else {
                    sideMenu.classList.remove("sticky");
                }
            }

            function logout(){
                var c=confirm("Confirm to logout?");
                if(c==true){
                    window.location.href="logout.php";
                }
            }
            function signup(){
                var c=confirm("Continue to Sign Up?");
                if(c==true){
                    window.location.href="signUp.php";
                }
            }
            function login(){
                var c=confirm("Confirm to login?");
                if(c==true){
                    window.location.href="logout.php";
                }
            }
            <?php if($_SESSION['type'] == "Guest"||$_SESSION['type'] == "Member"){ ?>
                editShoes.style.display="none";
                editFAQ.style.display="none";
                naveditShoes.style.display="none";
                naveditFAQ.style.display="none";
            <?php } ?>

            <?php if($_SESSION['type'] == "Guest"){ ?>
                
                logoutbutton.style.display="none";
            <?php } ?>

            
            <?php if(isset($_SESSION['id'])){ ?>
                var loginbutton=document.getElementById("login");
                var signupbutton=document.getElementById("signup");
                loginbutton.style.display="none";
                signupbutton.style.display="none";
            <?php } ?>
          
        </script>
    </body>
</html>
<?php
    session_start();
    require_once 'Database.php';
    $db=Database::getInstance();

    //set session to guest if enter as guest
    if(isset($_GET['type'])){
        $_SESSION['type']='Guest';
        echo "<script>window.location.href='home.php'</script>";
    }

    //set session to admin or member
    if(isset($_POST["btnLogin"])){
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $row = $db->rowCount($sql);

        if($row){
            $result = $db->fetch($sql, MYSQLI_NUM);
            list($id,$email, , ,$name, $gender,, , , , ,$type) = $result;

            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["gender"] = $gender;
            $_SESSION["type"] = $type;
            header("location: home.php");
        }else{
            echo "<script>alert('Username and password does not match. Please try again')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/index.css">
</head>
<body>
<div class="content loginBox">
    <form name="login" action="index.php" method="post">
        <h1>Login</h1>
        <div class="item">
            <i class="fa fa-user"></i>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="item">
            <i class="fa fa-lock"></i>
            <input type="password"  name="password" id="password" placeholder="password" required>
        </div>
        <div class="item inlineItem">
            <div>
                Don't have an account?
            </div>
            <div>
                <a href="signUp.php">Sign Up Now</a>
                <span> or </span>
                <a href="index.php?type=guest">Enter as guest</a>
            </div>
        </div>
        <button type="submit" value="login" name="btnLogin">Login</button>
    </form>
</div>
</body>
</html>



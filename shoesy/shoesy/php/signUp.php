<?php
//use to check whether email or username is repeated
require_once 'Database.php';
$db=Database::getInstance();

//repeated username check
if(isset($_GET["username"])){
    $testusername=$_GET["username"];
    $testUniqueUsernameSql = "SELECT * FROM user WHERE username='$testusername'";
    if ($db->rowCount($testUniqueUsernameSql)) {
        echo('1');
        exit;
    }else{
        echo('0');
        exit;
    }
}

//repeated email check
if(isset($_GET["email"])){
    $testemail=$_GET["email"];
    $testUniqueEmailSql = "SELECT * FROM user WHERE email='$testemail'";
    if ($db->rowCount($testUniqueEmailSql)) {
        echo('1');
        exit;
    }else{
        echo('0');
        exit;
    }
}

?>


<?php

if(isset($_POST["btnSignUp"])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];
        $street = $_POST['street'];

        $sql = "INSERT INTO user VALUES (null,'$username','$password','$email','$name','$gender','$dob','$street','$postcode','$state','$country', 'Member')";
        echo $sql;
        if($db->exec($sql)){
            echo "<script>alert('Sign Up success'); window.location.href='./php/index.php'</script>";
        }else{
            echo "<script>alert('Sign Up failed'); window.location.href='./php/index.php'</script>";
        }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../style/signUp.css">
    <script src="../script/signUp.js"></script>
</head>
<body>
<div class="content signUpBox">
    <form action="signUp.php" method="post">
        <h1>Sign Up</h1>
        <div class="item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"
                   required pattern="^[a-zA-Z0-9_]{3,15}$" onblur="nameCheck(this.value)" oninvalid="this.setCustomValidity('Username can only consist underscore and alphanumeric between 3 to 15 characters')" oninput="this.setCustomValidity('')">
            <span id="nameError" class="error">Username already existed, please try another one.</span>
        </div>
        <div class="item">
            <label for="password">Password</label>
            <input type="password"  name="password" id="password" required pattern="^[A-Za-z\d@$!%*?&_+-]{4,}$" oninvalid="this.setCustomValidity('Password must be longer than 4 character')" oninput="this.setCustomValidity('')">
        </div>
        <div class="item">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" onblur="emailCheck(this.value)" required pattern="^[a-zA-Z0-9_]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$" oninvalid="this.setCustomValidity('Invalid email format.')" oninput="this.setCustomValidity('')">
            <span id="emailError" class="error">Email already existed, please try another one.</span>
        </div>
        <div class="item">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required pattern="^[a-zA-Z\s\.]*$" oninvalid="this.setCustomValidity('Invalid name format.')" oninput="this.setCustomValidity('')">
        </div>
        <div class="itemRow">
            <div class="item">
                <label>Gender</label>
                <div class="inlineItem">
                    <div><label for="male">Male</label>
                        <input type="radio" value="M" name="gender" id="male" required>
                    </div>
                    <div>
                        <label for="female">Female</label>
                        <input type="radio" value="F" name="gender" id="female" required>
                    </div>
                </div>
            </div>
            <div class="item">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
        </div>
        <div class="itemRow">
            <div class="item">
                <label for="country">Country</label>
                <input type="text"  name="country" id="country" required>
            </div>
            <div class="item">
                <label for="state">State</label>
                <input type="text"  name="state" id="state" required>
            </div>
            <div class="item">
                <label for="postcode">Postcode</label>
                <input type="text"  name="postcode" id="postcode" required pattern="^[0-9]*$" oninvalid="this.setCustomValidity('Postcode can only consist of numbers.')" oninput="this.setCustomValidity('')">
            </div>
        </div>
        <div class="item">
            <label for="street">Street</label>
            <input type="text" name="street" id="street" required>
        </div>
        <button type="submit" value="btnSignUp" name="btnSignUp">Sign Up</button>
    </form>
</div>
</body>
</html>
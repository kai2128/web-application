<!--check user login or not-->

<?php
if(!(isset($_SESSION['type']))){
    echo "<script>alert('You are not logged in. Please login.')</script>";
    echo "<script>window.location.href='./php/index.php'</script>";
}
?>
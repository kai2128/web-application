<?php
    session_start();
    require_once 'Database.php';
    require_once '../includes/checkSession.php';
    
    $db=Database::getInstance();

    $sql="SELECT * FROM `faq`";
    $rows=$db->fetchAll($sql);
    $rowCount=$db->rowCount($sql);
    
    if(!empty($_POST)){
        if(isset($_POST['submit_add'])){
            $id=$_POST['id_form'];
            $category=$_POST['category_form'];
            $question=$_POST['question_form'];
            $answer=$_POST['answer_form'];
            $sql="INSERT INTO `faq` (`id`,`category`,`question`,`answer`) VALUES ('$id','$category','$question','$answer')";
            $db->exec($sql);
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else if(isset($_POST['submit_edit'])){
            $id=$_POST['id_form'];
            $category=$_POST['category_form'];
            $question=$_POST['question_form'];
            $answer=$_POST['answer_form'];
            $sql="UPDATE `faq` SET `category`='$category', `question`='$question', `answer`='$answer' WHERE `id`='$id'";
            $db->exec($sql);
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else if(isset($_POST['submit_delete'])){
            $id=$_POST['id_delete'];
            $sql="DELETE FROM `faq` WHERE `id`={$id}";
            $db->exec($sql);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
?>

<!doctype html>
<html>
    <head>

        <title>Shoesy EDIT FAQ</title>
        <link rel="stylesheet" href="../style/editFaq.css">
        <link rel="stylesheet" href="../style/animationBackground.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
            .navigation a:nth-child(8){
                font-weight: bold;
                color: white;
                border-bottom: 5px solid white;
            }
        </style>
    </head>
    <body>
        <?php if($_SESSION['type']=="Admin"){ ?>
            <?php include ('../includes/header_navMenu_burgerMenu.php') ?>
            <div class="background">
                <div class="content">
                
                    <div class="banner" id="banner">
                        <!--Add-->
                        <div class="addBanner" id="addBanner" onclick="showForm(this,'<?php echo $rowCount+1 ?>','','','')">
                            <div class="image"><img src="../resources/image/editFaq0.jpg"/></div>
                            <div class="addBar"><h1>ADD A NEW FAQ</h1></div>
                        </div>

                        <!--Edit Delete-->
                        <a class="editBanner" id="editBanner" href="#allFaq">
                            <div class="image"><img src="../resources/image/editFaq1.jpg"/></div>
                            <div class="editBar"><h1>EDIT / DELETE FAQ</h1></div>
                        </a>
                    </div>

                    <!--Form will hide by default-->
                    <div class="form" id="form">
                        <form action="editFaq.php" method="post">
                            <input type="text" name="id_form" id="id_form" hidden>
                            <label for="category_form">Category</label>
                            <select name="category_form" id="category_form" onchange="validation()">
                                <option value="Dispatch & Delivery">Dispatch & Delivery</option>
                                <option value="Returns">Returns</option>
                                <option value="Orders">Orders</option>
                                <option value="Product Info">Product Info</option>
                            </select>
                            <label for="question_form">Question</label>
                            <textarea name="question_form" id="question_form" onchange="validation()" placeholder="alphanumeric characters and common use symbols are available except quotes"></textarea>
                            <label for="answer_form">Answer</label>
                            <textarea name="answer_form" id="answer_form" onchange="validation()" placeholder="alphanumeric characters and common use symbols are available except except quotes"></textarea>
                            <div>
                                <input type="button" id="cancel_form" onclick="cancelEdit(this)" value="Cancel">
                                <button type="reset" id="reset_form" hidden></button>
                                <button type="submit" id="submit_form" onclick="closeForm(this)" disabled>Add</button>
                            </div>
                        </form>
                    </div>

                    <!--Delete will hide by default-->
                    <div class="delete_form">
                        <form action="editFaq.php" method="post">
                            <input type="text" name="id_delete" id="id_delete">
                            <button type="submit" name="submit_delete" id="submit_delete">Delete</button>
                        </form>
                    </div>

                    <!--Display all existing faq-->
                    <div class="allFaq" id="allFaq">
                        <table>
                            <tr>
                                <th>CATEGORY</th>
                                <th>QUESTION</th>
                                <th>ANSWER</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php foreach($rows as $row){ ?>
                            <tr id="<?php echo $row['id'] ?>">
                                <td class="category">
                                    <div><?php echo $row['category'] ?></div> 
                                </td>
                                <td class="question">
                                    <div><?php echo $row['question'] ?></div> 
                                </td>
                                <td class="answer">
                                    <div><?php echo $row['answer'] ?></div> 
                                </td>
                                <td class="delete" onclick="deleteFaq('<?php echo $row['id'] ?>')">Delete</td>
                                <td class="edit" onclick="showForm(this,'<?php echo $row['id'] ?>','<?php echo $row['category'] ?>','<?php echo $row['question'] ?>','<?php echo $row['answer'] ?>')">Edit</td>
                            </tr>
                            <?php } ?>
                        </table>                
                    </div>
                            
                </div>
            </div>
            <?php include ('../includes/footer.php') ?>
            <script src="../script/editFaq.js"></script>
        <?php }else{ ?>
            <!--Avoid non admin user access this page-->
                <div class="error">
                    <i class="material-icons">&#xe14b;</i>
                    <p>YOU ARE NOT ALLOW TO ACCESS THIS PAGE</p>
                </div>
                <style>
                    .error{
                        background-color: whitesmoke;
                        height: 100vh;
                        width: 100vw;
                        text-align: center;
                        color: red;
                        font-family: 'Poppins';
                        overflow: hidden;
                    }

                    .material-icons{
                        margin-top: 50vh;
                        display: block;
                    }
                </style>
        <?php } ?>
    </body>
</html>
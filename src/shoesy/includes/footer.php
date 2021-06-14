<!doctype html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            .footer{
                position: relative;
                height: 15vh;
                width: auto;
                bottom: 0px;
                padding: 1vw;
                margin: 0px;
                text-align: center;
                background-color: darkgray;
                font-size: 12px;
                color: white;
                z-index: 2;
            }
            .footer p{
                margin-top: 0vw;
            }
        </style>
        <style>
            <?php if($_SESSION['gender']=="M"){ ?>
                .footer{
                    background-color: rgb(135,206,250);
                }
            <?php }else if($_SESSION['gender']=="F"){ ?>
                .footer{
                    background-color: lightcoral;
                }
            <?php } ?>
        </style>
    </head>

    <footer class="footer" id="footer">
        <p>&copy 2021 SHOESY SDN BHD.</p>
        <p>All right reserved.</p>
        <i class="material-icons">&#xe55f;</i>
        <p>Malaysia</p>
    </footer>
</html>
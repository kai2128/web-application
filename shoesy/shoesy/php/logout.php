<?php
session_start();
session_destroy(); ?>
<script>
    let time = 1;
    function timeOut(time){
        --time;
         if(time===0){
             location.href = '../index.php';
             return;
         }
         setTimeout(timeOut,1000, time);
    };
    timeOut(time);
</script>";
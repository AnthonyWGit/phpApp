<?php
    session_start();       

    var_dump($_SESSION['products'][$_POST['submit']]["qtt"]);   
    echo($_SESSION['products'][$_POST['submit']]["qtt"]);
    $_SESSION['products'][$_POST['submit']]["qtt"] = $_SESSION['products'][$_POST['submit']]["qtt"] - 1;

    header("Location:recap.php");

?>
<?php
    session_start();       

    // var_dump($_SESSION['products'][$_POST['submit']]["qtt"]);    **TESTS
    //echo($_SESSION['products'][$_POST['submit']]["qtt"]);         **
    $_SESSION['products'][$_POST['submit']]["qtt"] = $_SESSION['products'][$_POST['submit']]["qtt"] - 1;
    if(($_SESSION['products'][$_POST['submit']]["qtt"]) < 1)
    {
        unset($_SESSION['products'][$_POST['submit']]);
    }

    header("Location:recap.php");

?>
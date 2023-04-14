<?php
    session_start();    
    
    if ($_POST['submit'] == "falseZ")
    {
        $_SESSION['products'] = [];
    }
    else
    {
        echo $_POST['submit']; 
        unset($_SESSION['products'][$_POST['submit']]);        
    }

    header("Location:recap.php");
?>


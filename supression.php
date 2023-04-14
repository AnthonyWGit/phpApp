<?php
    session_start();    
    
    if ($_POST['submit'] == "suppression")
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


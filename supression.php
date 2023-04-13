<?php
    session_start();    
    
    echo $_POST['submit']; 
    unset($_SESSION['products'][$_POST['submit']]);
    header("Location:recap.php");
?>


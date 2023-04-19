
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo "<img src='" . $_SESSION['products'][$_GET['action']]['image'] . " ' >" ;          //On veut l'image du même index que le produit sur lequel
?>                                                                                          <!--l'utilisateur a cliqué-->
</body>
</html>


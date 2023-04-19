
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php
    echo "<div class='container-fluid vh-100 d-flex align-content-center'>"; //Div pour centrer
    echo "<div class ='d-flex flex-grow-1 flex-column justify-content-center flex-wrap align-content-center align-items-stretch'>";
    echo "<img src='" . $_SESSION['products'][$_GET['action']]['image'] . " ' class='img-fluid' >" ;          //On veut l'image du même index que le produit sur lequel
    echo "</div>";
    echo "</div>";
?>                                     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>                                                     <!--l'utilisateur a cliqué-->
</body>
</html>


<?php
    session_start();       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <?php
    if (($_SESSION['status'] == 1 || 2) && $_SESSION['status'] != 'init')
    {
        echo "<div class='container-fluid d-flex alert alert-info bg-gradient bg-opacity-25 w-50 rounded justify-content-around text-danger mt-1'><h4>"
        .$_SESSION['msg']."</h4> </div>";
        $_SESSION['status'] = 'init';
    }
    else if ($_SESSION['status'] == 'init')
    {

    }
    ?>
    <div class="container-fluid d-flex flex-wrap mt-3">
        <div class="d-flex flex-column flex-grow-1 ">
            <div class="l-5 mr-5 bg-dark <?= (isset($_SESSION['products']) == false || $_SESSION['products']== []) ? 'rounded-top ': 'rounded-start ' ?> bg-gradient "?> 
                <header class="">
                    <nav class="navbar-expand-lg navbar-nav display-6 ">
                        <ul class="d-flex flex-row  navbar-nav justify-content-around">
                            <li><a href="recap.php" class="navbar-brand text-white">Récap</a></li>
                            <li><a href="index.php" class="navbar-brand text-white">Index</a></li>                            
                        </ul>
                    </nav>
                </header>
            </div>
            <div class="d-flex justify-content-center flex-column <?= (isset($_SESSION['products']) == false || $_SESSION['products']== []) ? 'rounded-bottom ' : 'rounded-start ' ?>flex-wrap ml-5 mr-5 mb-5 bg-success bg-gradient bg-opacity-75 ">
                <h1 class="text-center text-info display-2 user-select-none"><u>Ajouter un produit</u></h1>
                <form action="traitement.php" method="post" class="d-flex flex-column justify-content-around form-control bg-light bg-gradient bg-opacity-50">
                    <p>
                        <label>
                        <div class="well well-lg display-6 fst-italic user-select-none p-3">Nom du produit : </div>
                            <input type="text" name="name" class="w-50 p-1 m-2 form-control form-control-lg ">
                        </label>
                    </p>
                    <p>
                        <label>
                        <div class="well well-lg display-6 fst-italic user-select-none p-3">Prix du produit : </div>
                            <input type="number" step="any" name="price" class="w-50 p-1 m-2 form-control form-control-lg">
                        </label>
                    </p>
                    <p>
                        <label>
                        <div class="well well-lg display-6 fst-italic user-select-none p-3">Quantité désirée : </div>
                            <input type="number" name="qtt" value="1" class="w-50 p-1 m-2 form-control form-control-lg">
                        </label>
                    </p>
                    <p class="m-2">
                        <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-lg btn-primary"> <!-- C'est ce qui est dans le submit qui va être vérifié dans la page de traitement-->
                    </p>
                </form>
            </div>
        </div>
<!--____________________________________________________________________________________-->
<?php
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"]))   //<!-- Affichage récapitulatif des produits-->
    {                                                                    //N'apparait que quand il y a des produits dans session
        
    }
    else
    {
        echo    "<div class='d-flex flex-column flex-fill overflow-auto ml-5 mr-5 mb-5 bg-dark bg-gradient w-25 rounded-end text-center bg-opacity-25 border border-secondary rounded-right'>
                    <h5 class='m-1 display-6 pb-4'>Articles dans le panier</h5>
                    <ul class='d-flex flex-nowrap justify-content-center align-items-center rounded-end list-group'>";
                        foreach($_SESSION['products'] as $index => $product)
                        {
                            echo "<li class='list-group-item overflow-auto list-group-item-action rounded m-1 w-75 list-group-item-info text-center'>".$product["name"]."</li>";
                        }
                        
        echo    "</ul>
                </div>";
    }
?>
<!--______________________________________________________________________________________________________-->

    </div>    
</body>
</html>
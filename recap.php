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
    <title>RECAPITULATIF DES PRODUITS</title>
</head>
<body>
<div class="container-fluid d-flex flex-wrap mt-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="l-5 mr-5 rounded bg-dark bg-gradient">
                <header class="">
                    <nav class="navbar-expand-lg navbar-nav display-6 ">
                        <ul class="d-flex flex-row  navbar-nav justify-content-around">
                            <li><a href="recap.php" class="navbar-brand text-white">Récap</a></li>
                            <li><a href="index.php" class="navbar-brand text-white">Index</a></li>                            
                        </ul>
                    </nav>
                </header>
            </div>
    <?php //var_dump($_SESSION); 
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"]))          //Quand il n'y a pas de produits ou des produits nons filtrés 
    {
        echo "<p>Pas de produits en session</p>";
    }
    else
    {
        echo "<div class='pt-5  d-flex flex-row flex-wrap'>",
           "<table class='table text-center table-hover table-responsive table-striped align-middle'>",
                "<thead class='table-info'>",
                    "<tr>",
                        "<th class='w-25'>#</th>",
                        "<th class='w-25'>Nom</th>",
                        "<th class='w-25'>Prix</th>",
                        "<th class='w-100'>Quantité</th>",
                        "<th class='w-100'>Total</th>",
                        "<th class='w-100'></th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($_SESSION["products"] as $index => $product)
        {
            echo "<tr>",
                    "<td class=''>".$index."</td>", 
                    "<td>".$product["name"]."</td>",
                    "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",      //&nbsp : non-breaking space : strings separated by this will not appear on second line  
                    "<td class='d-flex flex-row justify-content-around align-items-center'>
                        <form action='traitement.php?action=enleverQtt' method='post'>
                            <button class='btn btn-info  text-nowrap class='p-3' value='$index' name='submit'>
                                <i class='bi bi-arrow-down'></i>
                            </button>
                        </form>"
                        .$product["qtt"].
                        "<form action='traitement.php?action=ajoutQtt' method='post'>
                            <button class='btn btn-info  text-nowrap' value='$index' name='submit'>
                                <i class='bi bi-arrow-up'></i>
                            </button>
                        </form>
                    </td>",
                    "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>
                        <form action='traitement.php?action=supprimerProduit' method='post'>
                            <button class='btn btn-warning' value='$index' name='submit'>
                                <i class='bi bi-x'></i>
                            </button>
                        </form>
                    </td>",
                "</tr>";
            $totalGeneral += $product['total'];
            var_dump($totalGeneral);
        }
        echo "<tr>",
                "<td><form action='traitement.php?action=suprimAll' method='post'><button class='btn btn-warning' value='".$_SESSION['supprimerTOUT']."' name='submit'>Tout supprimer</button></form></td>",
                "<td colspan=4>Total général :</td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td></div>";
    }
    ?>
    </div>
</div>
</body>
</html>
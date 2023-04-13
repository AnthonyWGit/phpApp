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
            <div class=" l-5 mr-5 rounded bg-dark bg-gradient">
                <header>
                    <nav class="navbar-expand-lg navbar-nav display-6 ">
                        <ul class="navbar-nav justify-content-around w-100">
                            <li><a href="recap.php" class="navbar-brand text-white">Récap</a></li>
                            <li><a href="index.php" class="navbar-brand text-white">Index</a></li>                            
                        </ul>
                    </nav>
                </header>
            </div>
    <?php var_dump($_SESSION); 
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"]))
    {
        echo "<p>Pas de produits en session</p>";
    }
    else
    {
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($_SESSION["products"] as $index => $product)
        {
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product["name"]."</td>",
                    "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",      //&nbsp : non-breaking space : strings separated by this will not appear on second line  
                    "<td>".$product["qtt"]."</td>",
                    "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>
                        <form action='supression.php' method='post'>
                            <button class='btn btn-warning' value='$index' name='submit'>
                                <i class='bi bi-x'></i>
                            </button>
                        </form>
                    </td>",
                "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "<tr>",
                "<td colspan=4>Total général :</td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>";
    }
    ?>
    </div>
</div>
</body>
</html>
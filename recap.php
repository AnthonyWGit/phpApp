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
    <title>RECAPITULATIF DES PRODUITS</title>
</head>
<body>
    <div class="container d-flex justify-content-center flex-column flex-wrap rounded bg-dark bg-gradient">
        <header>
            <nav class="navbar navbar-expand-lg display-6 justify-content-around">
                <a href="recap.php" class="navbar-brand text-white">Récap</a>
                <a href="index.php" class="navbar-brand text-white">Index</a>
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
                "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "<tr>",
                "<td colspan=4>Total général :</td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>";
    }
    ?>
</body>
</html>
<?php
    session_start();
    ob_start();  
?>
<div class="container-fluid d-flex flex-wrap mt-3">
        <div class="d-flex flex-column flex-grow-1">
    <?php //var_dump($_SESSION); 
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"]))          //Quand il n'y a pas de produits ou des produits nons filtrés 
    {
        var_dump($_SESSION["products"]);
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
        }
        echo "<tr>",
                "<td><form action='traitement.php?action=suprimAll' method='post'><button class='btn btn-warning' value='supprimer' name='submit'>Tout supprimer</button></form></td>",
                "<td colspan=4>Total général :</td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td></div>";
    }
    ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php
$contenu = ob_get_clean();
require "template.php"; ?>

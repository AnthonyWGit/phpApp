
<?php
    session_start();
    ob_start();
?>

<?php
    if (isset($_SESSION['msg']) )
    {
        echo "<div class='alert d-flex flex-column flex-wrap order-1 alert-success mt-3'>"
        .$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }
    else 
    {

    }
    ?>

<!--______________________________FORM_______________________________________________-->

        <div class="d-flex flex-column w-75 flex-grow-1 ">          
            <div class="d-flex justify-content-center flex-column flex-wrap ml-5 mr-5 mb-5 ">

                <form action="traitement.php?action=ajoutProduit" method="post" class="d-flex flex-column justify-content-around form-control bg-light bg-gradient bg-opacity-50">
                <h1 class="text-center text-info display-2 user-select-none"><u>Ajouter un produit</u></h1>                    
                    <p>
                        <label>
                        <div class="fst-italic user-select-none p-3">Nom du produit : </div>
                            <input type="text" name="name" class="w-50 p-1 m-2 form-control form-control-lg ">
                        </label>
                    </p>
                    <p>
                        <label>
                        <div class="fst-italic user-select-none p-3">Prix du produit : </div>
                            <input type="number" step="any" name="price" class="w-50 p-1 m-2 form-control form-control-lg">
                        </label>
                    </p>
                    <p>
                        <label>
                        <div class="fst-italic user-select-none p-3">Quantité désirée : </div>
                            <input type="number" name="qtt" value="1" class="w-50 p-1 m-2 form-control form-control-lg">
                        </label>
                    </p>
                    <p class="m-2">
                        <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-lg btn-primary"> <!-- C'est ce qui est dans le submit qui va être vérifié dans la page de traitement-->
                    </p>
                </form>
            </div>
        </div>
<!--_________________________________CART___________________________________________________-->
<?php
    if (isset($_SESSION["products"]) == false || ($_SESSION["products"] == []))   //<!-- Affichage récapitulatif des produits-->
    {                                                                    //N'apparait que quand il y a des produits dans session
        
    }
    else
    {
        echo    "<div class='d-flex flex-grow-1 flex-column overflow-auto ml-5 mr-5 mb-5 bg-light w-25 text-center'>
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

<?php

$contenu = ob_get_clean();

require "template.php"; ?>

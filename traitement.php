
<?php
    ob_start();
?>

<?php
  
    if (isset($_GET['action'])) 
    {
        switch($_GET['action'])
        {
            case "ajoutProduit":               //Vérifier qu'on accède à cette page via validation du formulaire
                if (isset($_POST["submit"]))            
                {                                  //Vérifier que toutes les valeurs correspondent à ce qu'on veut
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);                                   //Vérifier que toutes les valeurs correspondent à ce qu'on veut
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    $_SESSION['msg'] = "Le produit a été entré";
                    $_SESSION['supprimerTOUT'] = "suppression";
                    $yes = 1;
                    $_SESSION['status'] = $yes;
                    if($name && $price && $qtt)
                    {
                        $product = [                                         //Caractéristiques d'un produit
                            "name"  => $name,
                            "price" => $price,
                            "qtt"   => $qtt,
                            "total" => $price*$qtt
                        ]; 
                        $_SESSION['products'][] = $product;                 //Mettre le production dans un array de produits conservé dans la superglobale session
                    }
                    else
                    {
                        $no = 2;
                        $_SESSION['msg'] = "Juste non";
                    }
                header("Location:index.php");                      
                }   
                break;
                case "suprimAll":
                    unset($_SESSION['products']);
                    header("Location:recap.php");                     
                    break;
                case "ajoutQtt":
                    $_SESSION['products'][$_POST['submit']]["qtt"] = $_SESSION['products'][$_POST['submit']]["qtt"] + 1;
                    $_SESSION['products'][$_POST['submit']]["total"] = $_SESSION['products'][$_POST['submit']]["qtt"] * $_SESSION['products'][$_POST['submit']]["price"];
                    header("Location:recap.php");  
                    break;
                case "enleverQtt":
                    $_SESSION['products'][$_POST['submit']]["qtt"] = $_SESSION['products'][$_POST['submit']]["qtt"] - 1;
                    if(($_SESSION['products'][$_POST['submit']]["qtt"]) < 1) unset($_SESSION['products'][$_POST['submit']]);
                    $_SESSION['products'][$_POST['submit']]["total"] = $_SESSION['products'][$_POST['submit']]["qtt"] * $_SESSION['products'][$_POST['submit']]["price"];
                    header("Location:recap.php");                      
                    break;
                case "supprimerProduit":
                    echo $_POST['submit']; 
                    unset($_SESSION['products'][$_POST['submit']]);     
                    header("Location:recap.php");  
                    break; 
        }
}        //Toujours à la fin ! Redirection si utilisateur arrive sur cette page via url 


$contenu = ob_get_clean();

require "template.php"; ?>

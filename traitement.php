
<?php
    session_start();
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
        //____________________________VERIFICATION DES IMAGES________________________________________
                    if (!empty($_FILES))
                    {
                        $target_dir = "uploads/";                                                   //Emplacement où les images sont hébergées
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);     // .basename retourne la dernière composante du chemin
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));     //cherche le type du fichier
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) 
                        {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                        } 
                        else 
                        {
                        echo "File is not an image.";
                        $uploadOk = 0;
                        }                        
                    }

        //____________________________________________________________________________________________________
                    $_SESSION['msg'] = "Le produit a été entré";
                    $_SESSION['supprimerTOUT'] = "suppression";
                    $yes = 1;
                    $_SESSION['status'] = $yes;
                    if(($name && $price && $qtt) || ($name && $price && $qtt & $_FILES["fileToUpload"]))
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
                        var_dump($_POST);
                        die();
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

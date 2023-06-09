
<?php
    session_start();
?>

<?php
    if (isset($_GET['action'])) 
    {
        switch($_GET['action'])
        {
            case "ajoutProduit":               //Vérifier qu'on accède à cette page via validation du formulaire
                if (isset($_POST["submit"]))            
                {                                  //Vérifier que toutes les valeurs correspondent à ce qu'on veut
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);                                   //Vérifier que toutes les valeurs correspondent à ce qu'on veut
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        //____________________________VERIFICATION DES IMAGES________________________________________
                    if (!empty(($_FILES['fileToUpload']["name"])))
                    {
                        var_dump($_FILES);
                         $target_dir = "uploads/";                                                   //Emplacement où les images sont hébergées
                         $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);     // .basename retourne la dernière composante du chemin
                         $uploadOk = 1;
                         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));     //cherche le type du fichier
                         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                         if($check !== false) 
                        {
                           echo "Fichier est bien une image - " . $check["mime"] . ".";             //mime = MIME ; c'est un format qui supporte des choses autre que texte ASCII
                           $uploadOk = 1;                                                           //dont des fichiers images
                           var_dump($check["mime"]);
                        } 
                        else 
                        {
                           echo "Fichier N4EST PAS UNE IMAGe.";
                           $uploadOk = 0;
                        }
                        if (file_exists($target_file))                                            //Vérifier que le fichier existe déjà
                        {   
                            echo "Fichier déjà existant";
                            $uploadOk = 0;
                        }
                        if ($_FILES["fileToUpload"]["size"] > 500000000)            //Vérifier que le ficher ne dépasse pas 500 mb
                        {
                            echo 'fichier trop grand !';
                            $uploadOk = 0;
                        }
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" //On regarde si le type de ficher
                        && $imageFileType != "gif" ) //N'est pas jpg ou n'est pas png ou n'est pas jpeg ou n'est pas gif
                        {
                            echo "Pas le bon format";
                        }
                        if ($uploadOk == 0)                 //Voir en en haut $uploadOk == 0 c'est tous les cas où il y a une erreur
                        {
                            echo "error dans l'upload";
                        }
                        else
                        {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                            {
                                echo "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a été téléchargé."; //Fichiers déplacés vers upload
                            } 
                            else 
                            {
                                echo "Non, ça ne marche pas d'upload un pdf.";
                            }                            
                        }


                        echo "<img src='".$target_file."'>";
                    }
                    else
                    {

                    }
        //____________________________________________________________________________________________________
                    $_SESSION['msg'] = "Le produit a été entré";
                    // $_SESSION['supprimerTOUT'] = "suppression";
                    // $yes = 1;
                    // $_SESSION['status'] = $yes;
                    if($name && $price && $qtt)
                    {
                        $product = [                                         //Caractéristiques d'un produit
                            "name"  => $name,
                            "price" => $price,
                            "qtt"   => $qtt,
                            "total" => $price*$qtt,
                            "image" => $target_file
                        ]; 
                        $_SESSION['products'][] = $product;                 //Mettre le production dans un array de produits conservé dans la superglobale session
                        var_dump($_SESSION['products']);
                        var_dump($_FILES);
                        //die();
                    }
                    else
                    {
                        $no = 2;
                        $_SESSION['msg'] = "Juste non";
                        var_dump($_POST);
                        //die();
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
                    if(($_SESSION['products'][$_POST['submit']]["qtt"]) < 1) 
                    {
                        unset($_SESSION['products'][$_POST['submit']]);
                    }
                    else
                    {
                        $_SESSION['products'][$_POST['submit']]["total"] = $_SESSION['products'][$_POST['submit']]["qtt"] * $_SESSION['products'][$_POST['submit']]["price"];                        
                    }
                    
                    header("Location:recap.php");                      
                    break;
                case "supprimerProduit":
                    echo $_POST['submit']; 
                    unset($_SESSION['products'][$_POST['submit']]);     
                    header("Location:recap.php");  
                    break; 
        }
}        //Toujours à la fin ! Redirection si utilisateur arrive sur cette page via url 


// $contenu = ob_get_clean();

// require "template.php"; ?>

<!DOCTYPE html>
<html lang="en">                                                <!-- Template sert à inclure doctype, head, etc. (tous les éléments communs des fichiers php) dans ce 
                                                                fichier pour qu'il soit inclus dans toutes les parties du site -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid d-flex flex-wrap mt-3">
        <div class="d-flex flex-column w-75 flex-grow-1 ">
            <div class="l-5 mr-5 bg-dark rounded bg-gradient "> 
                <header>
                    <nav class="navbar-expand-lg navbar-nav display-6 ">
                        <ul class="d-flex flex-row  navbar-nav justify-content-around">
                            <li><a href="recap.php" class="navbar-brand text-white">Récap</a></li>
                            <li><a href="index.php" class="navbar-brand text-white">Index</a></li>                            
                        </ul>
                    </nav>
                </header>
            </div>
        </div>

    <?= $contenu ?>

    </div>    
</body>
</html>
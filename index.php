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
    <div class="container-fluid d-flex flex-wrap">
        <div class="d-flex flex-column flex-grow-1">
            <div class=" l-5 mr-5 mt-5 rounded bg-dark bg-gradient">
                <header>
                    <nav class="navbar-expand-lg navbar-nav display-6 ">
                        <ul class="navbar-nav justify-content-around w-100">
                            <li><a href="recap.php" class="navbar-brand text-white">Récap</a></li>
                            <li><a href="index.php" class="navbar-brand text-white">Index</a></li>                            
                        </ul>
                    </nav>
                </header>
            </div>
            <div class="d-flex justify-content-center flex-column flex-wrap ml-5 mr-5 mb-5 rounded bg-success bg-gradient ">
                <h1 class="text-center text-info display-2 user-select-none"><u>Ajouter un produit</u></h1>
                <form action="traitement.php" method="post" class="d-flex flex-column justify-content-around">
                    <p>
                        <label>
                        <div class="well well-lg display-6 fst-italic user-select-none p-3">Nom du produit : </div>
                            <input type="text" name="name" class="w-50 p-1 m-2">
                        </label>
                    </p>
                    <p>
                        <label>
                        <div class="well well-lg display-6 fst-italic user-select-none p-3">Prix du produit : </div>
                            <input type="number" step="any" name="price" class="w-50 p-1 m-2">
                        </label>
                    </p>
                    <p>
                        <label>
                        <div class="well well-lg display-6 fst-italic user-select-none p-3">Quantité désirée : </div>
                            <input type="number" name="qtt" value="1" class="w-50 p-1 m-2">
                        </label>
                    </p>
                    <p class="m-2">
                        <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-lg btn-primary"> <!-- C'est ce qui est dans le submit qui va être vérifié dans la page de traitement-->
                    </p>
                </form>
            </div>
        </div>
        <div class="d-flex">
            <ul>
                <li>item</li>
                <li>Item</li>
            </ul>
        </div>
    </div>    
</body>
</html>
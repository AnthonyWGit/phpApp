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
<div   
class="container d-flex justify-content-center flex-column flex-wrap m-5 rounded ">
    <h1 class="text-center link-secondary display-2"><u>Ajouter un produit</u></h1>
    <form action="traitement.php" method="post" class="d-flex justify-content-center flex-column">
        <p>
            <label>
            <div class="well well-lg display-6">Nom du produit : </div>
                <input type="text" name="name" class="w-50 p-3">
            </label>
        </p>
        <p>
            <label>
            <div class="well well-lg display-6">Prix du produit : </div>
                <input type="number" step="any" name="price" class="w-50 p-3">
            </label>
        </p>
        <p>
            <label>
            <div class="well well-lg display-6">    Quantité désirée : </div>
                <input type="number" name="qtt" value="1" class="w-50 p-3">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-lg btn-primary"> <!-- C'est ce qui est dans le submit qui va être vérifié dans la page de traitement>
        </p>
    </form>
</div>    
</body>
</html>
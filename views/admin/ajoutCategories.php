<?php

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-white">Ajout de catégorie</title>
</head>
<body>
    <h1 class="h2 text-center text-white"> <u>Ajouter une catégorie</u></h1>
    <div class="row justify-content-center">
        <div class="col-4">
        <form method="post" action="" class="text-white">
            <div class="form-group">
            <label for="cat" >Catégorie: </label>
            <input type="text" id="cat" name="cat" placeholder="Entrer la catégorie" class="form-control">
            </div>
            <button type="submit" name="ajout" class="btn btn-dark btn-block">Insérer</button>
        
        </form>
        </div>
    </div>
</body>
</html>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>
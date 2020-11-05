<?php
ob_start();
?>
<h1 class="h2 text-center text-white">Ajout d'un article</h1>
<form action="" method="post" enctype="multipart/form-data" class="text-white">
    <div class="row">
    <div class="form-group col">
        <label for="nom_article">Nom de l'article:</label>
        <input type="text" name="nom_article" id="nom_article" placeholder="Entrer le nom de l'article" class="form-control">
    </div>
  
    <div class="form-group col">
        <label for="prix_article">Prix de l'article:</label>
        <input type="number" name="prix_article" id="prix_article" placeholder="Entrer le prix" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col">
        <label for="description_article">Description de l'article::</label>
        <input type="text" name="description_article" id="description_article" placeholder="Entrer la description" class="form-control">
    </div>
   
    <div class="form-group col">
        <label for="stock">stock:</label>
        <input type="number" name="stock" id="stock" placeholder="Entrer le stock" class="form-control">
    </div>
    <div class="form-group col">
        <label for="promotion">promotion:</label>
        <input type="number" name="promotion" id="promotion" placeholder="Entrer la promotion" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col">
        <label for="image">Image:</label>
        <input type="File" name="image" id="image"  class="form-control">
    </div>
    <div class="form-group col">
        <label for="id_categorie">Catégorie:</label>
        <select name="id_categorie" id="id_categorie" class="form-control">
        <option hidden>Choisir une catégorie</option>
        <?php foreach($datas as $cat){ ?>  
        <option value="<?=$cat->getId_categorie();?>"><?=$cat->getNom_categorie();?></option>
        <?php } ?>
        </select>
    </div>
    </div>
  

    <button type="submit" name="soumis" class="btn btn-dark btn-block">Soumettre</button>
</form>
<?php

$content = ob_get_clean();
require_once('./views/template.php');
?>
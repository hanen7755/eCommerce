<?php
  //var_dump($row);
ob_start();

?>
<h1 class="h2 text-center text-white">Modification article</h1>
<form action="" method="post" enctype="multipart/form-data" class="text-white">
    <div class="row">
    <div class="form-group col">
        <label for="nom_article">Nom:</label>
        <input type="text"  value="<?=$row[0]->getNom_article();?>"  name="nom_article" id="nom_article" placeholder="Entrez le nom" class="form-control">
    </div>
    <div class="form-group col">
        <label for="prix_article">Prix:</label>
        <input type="text" value="<?=$row[0]->getPrix_article();?>" name="prix_article" id="prix_article" placeholder="Entrez le prix" class="form-control">
    </div>
    <div class="form-group col">
        <label for="description_article">Description:</label>
        <input type="text" value="<?=$row[0]->getDescription_article();?>" name="description_article" id="description_article" placeholder="Entrez la description" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col">
        <label for="stock">Stock:</label>
        <input type="text" value="<?=$row[0]->getStock();?>" name="stock" id="stock" placeholder="Entrez le stock" class="form-control">
    </div>
   
    <div class="form-group col">
        <label for="promotion">Promotion:</label>
        <input type="text" value="<?=$row[0]->getPromotion();?>" name="promotion" id="promotion" placeholder="Entrez la promotion" class="form-control">
    </div>
    <div class="form-group col">
        <label for="image">Image:</label>
        <input type="File"  name="image" id="image"  class="form-control">
        <p class="mt-1"><img src="./assets/images/<?=$row[0]->getImage();?>" alt="" width="100"></p>
    </div>
    
    <button type="submit" name="soumis" class="btn btn-dark btn-block">Soumettre</button>
</form>
<?php

$content = ob_get_clean();
require_once('./views/template.php');
?>
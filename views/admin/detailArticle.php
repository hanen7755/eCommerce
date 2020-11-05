<?php ob_start();?>
<div class="card col-6 offset-3">
  <img class="card-img-top" src="./assets/images/<?=$row[0]->getImage(); ?>" alt="" width="15%">
  <div class="card-body">
    <h5 class="card-title">
        <?=strtoupper($row[0]->nom_categorie) ?> N°: <?=$row[0]->getId_article();?> 
    </h5>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Nom: <?=$row[0]->getNom_article();?></li>
    <li class="list-group-item">Prix: <?=$row[0]->getPrix_article();?></li>
    <li class="list-group-item">Description: <?=$row[0]->getDescription_article();?>€</li>
    <li class="list-group-item">Stock: <?=$row[0]->getStock();?></li>
    <li class="list-group-item">Promotion: <?=$row[0]->getPromotion();?></li>
  </ul>

</div>

<button><a href="index.php?action=list_article" class="btn btn-warning"></i>Retour</a> </button>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>

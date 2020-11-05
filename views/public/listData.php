<?php 
//session_destroy(); 
ob_start(); 
?> 
 
 

   <div class="row m-3"> 
      <?php foreach ($datasArticle as $article) {?> 
    
      <?php foreach ($datasCat as $cat) { ?> 
      <?php } ?>
            <div class="col-4"> 
               <div class="card"> 
                  <img class="card-img-top" src="./assets/images/<?= $article->getImage(); ?>" alt="Card image cap" height="400" /> 
                  <div class="card-body"> 
                     <h5 class="card-title">Nom: <?= $article->getNom_article(); ?></h5> 
                     <p class="card-text"><?= $article->getDescription_article(); ?></p> 
                  </div> 
                  <ul class="list-group list-group-flush"> 
                     <li class="list-group-item">Prix: 
                        <span class="badge badge-primary"> 
                           <?= $article->getPrix_article(); ?> € 
                        </span> 
                     </li> 
 
                     </li> 
                     <li class="list-group-item">promotion: <?= $article->getPromotion(); ?></li> 
                     <li class="list-group-item">stock: <?= $article->getStock(); ?></li> 
                     <li class="list-group-item">Date de création: <?= $article->getDate_created_article(); ?></li> 
                  </ul> 
                  <div class="card-body"> 
                     <form action="index.php?action=ajoutPanier" method="post"> 
                        <input type="hidden" name="id_article" value="<?= $article->getId_article(); ?>"> 
                        <input type="hidden" name="prix_article" value="<?= $article->getPrix_article(); ?>"> 
                        <input type="number" name="quantite" value="" required> 
                        <!-- <input type="hidden" name="image" value="<?= $article->getImage(); ?>">  -->
                        <input type="hidden" name="nom_article" value="<?= $article->getNom_article(); ?>"> 
 
                        <button name="ajoutPanier" type="submit" class="card-link btn btn-danger">Ajout Panier</button> 
 
                     </form> 
 
 
                  </div> 
               </div> 
            </div> 
 
<?php  }  ?> 
</div> 
</div> 
<?php 
 
$content = ob_get_clean(); 
require_once('./views/gabarit.php'); 
?>
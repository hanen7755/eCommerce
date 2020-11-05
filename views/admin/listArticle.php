<?php 
ob_start();
?>
<div class="container">
<h1>Liste d'article</h1>
    <form action="" method="post" class="text-dark">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Recherche..." aria-label="" aria-describedby="">
            <div class="input-group-append">
                <button name="envoi" class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
   </form>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Image</th>
            <th>Date de création</th>
            <th>Promotion </th>
            <th>Action </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $row){ ?>
        <tr>
            <td><?=$row->getId_article(); ?></td>
            <td><?=$row->getNom_article(); ?></td>
            <td><?=$row->getPrix_article(); ?></td>
            <td><?=$row->getDescription_article(); ?></td>
            <td>
                <img src="./assets/images/<?=$row->getImage();?>" width="50" alt=""></td>
            <td><?=$row->getDate_created_article(); ?></td>
            <td><?=$row->getPromotion(); ?></td>
            <td class="text-center d-flex justify-content-between">
                <button><a href="index.php?action=detail_article&id=<?=$row->getId_article(); ?>" class="btn btn-info"><i class="fa fa-info-circle"></i> Détail</a></button>

                <button><a href="index.php?action=edit_article&id=<?=$row->getId_article(); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>Edit</a> </button>

                <button><a href="index.php?action=add_article&id=<?=$row->getId_article(); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>Ajouter</a> </button>

                <button><i class="fa fa-trash"><a onclick="return confirm('Voulez-vous supprimer?')"  href="index.php?action=delete_article&id=<?=$row->getId_article(); ?>&image=<?=$row->getImage(); ?>">Supp</a></i></button>
        <?php } ?>
            </td>
        </tr>       
    </tbody>
</table>
        </div>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>
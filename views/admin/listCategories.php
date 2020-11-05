<?php

 ob_start(); 
 ?>
<h1 class="h2 text-center text-white"><u>Liste des catégories</u></h1>
<table class="table table-striped text-black">
    <thead>
        <tr class="text-black">
            <th>Id</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $cat){ ?>
        <tr>
            <td><?=$cat->getId_categorie(); ?></td>
            <td><?=$cat->getNom_categorie(); ?></td>
            <td>
                
                <button><a href="index.php?action=delete_cat&id=<?=$cat->getId_categorie(); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>Supprimer</a> </button>
                <button><a href="index.php?action=add_cat&id=<?=$cat->getId_categorie(); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>Add</a> </button>
                
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php 

$content = ob_get_clean();
require_once('./views/template.php');
?>

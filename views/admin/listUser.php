<?php

ob_start();
?>
<h1 class="h2 text-center text-white"><u>Liste des utilisateurs</u></h1>
<table class="table table-striped text-white">
    <thead>
        <tr class="">
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Login</th>
            <th>Action</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $user){ ?>
        <tr>
            <td><?=$user->getId_user(); ?></td>
            <td><?=$user->getNom_user(); ?></td>
            <td><?=$user->getPrenom_user(); ?></td>
            <td><?=$user->getMail_user(); ?></td>
            <td><?=$user->getLogin(); ?></td>
            <td>
                <a class="btn btn-danger" href="index.php?action=suppUser&id=<?=$user->getId_user(); ?>"
                 onclick="return confirm('Etes sûr...')"> 
                 <i class=" fa fa-trash"></i></a>
            </td>
            <td>
                <?php 
                    if($user->getRole()==1){
                        echo"Adiministrateur";
                   }else{
                        echo "Utilisateur";
                    } 
                ?>
            

            

              
            <?php } ?>
               
        </tr>
        <button><a href="index.php?action=register" class="btn btn-warning">Ajouter</a> </button>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>
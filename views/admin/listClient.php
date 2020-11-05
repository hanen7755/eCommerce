<?php ob_start(); ?>
<h1 class="h2 text-center text-white"><u>Liste des Clients</u></h1>
<table  >
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Mail</th>
            <th>Telephone</th>
            <th >Date de création</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $client){ ?>
        <tr>
            <td><?=$client->getId_client(); ?></td>
            <td><?=$client->getNom_client(); ?></td>
            <td><?=$client->getPrenom_client(); ?></td>
            <td><?=$client->getAdresse_client(); ?></td>
            <td><?=$client->getMail_client(); ?></td>
            <td><?=$client->getTel_client(); ?></td>
            <td><?=$client->getDate_created_client(); ?></td>
           
        </tr>
        <?php } ?> 
    </tbody>
</table>

<?php

$content = ob_get_clean();
require_once('./views/template.php');
?>
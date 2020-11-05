<?php
session_start();
//var_dump($_SESSION);
//var_dump($_POST);
ob_start();

?>

<style>
    table {
        border: 1px solid black;

    }

    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Id article </th>
            <th>Titre</th>
            <th>prix</th>
            <th>Quantité </th>
            <th>Total</th>
            <th>Action</th>

        </tr>

    </thead>
    <tbody>



        <form action="index.php?action=checkout" method="post">

            <?php if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) { // test l'existance du panier et s'il n'est pas vide
                //var_dump($_SESSION['panier']['titre']);
                //var_dump($_SESSION['panier']['nom_article']); die();
                $nombreArticle = count($_SESSION['panier']['nom_article']);
                for ($i = 0; $i < $nombreArticle; $i++) {

                    $totalArticle = $_SESSION['panier']['prix_article'][$i] * $_SESSION['panier']['quantite'][$i];
            ?>
                    <tr>
                        <td><?= $_SESSION['panier']['id_article'][$i] ?></td>
                        <td><?= $_SESSION['panier']['nom_article'][$i] ?></td>
                        <td><?= $_SESSION['panier']['prix_article'][$i] ?></td>
                        <td><?= $_SESSION['panier']['quantite'][$i] ?></td>
                        <td><?= $totalArticle ?>.00€</td>
                        <td>
                        <a href="index.php?action=supprimerArticlePanier&id=<?= $_SESSION['panier']['id_article'] ?>" name="supprimerArticle" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir  supprimer l\'article <?= $_SESSION['panier']['id_article'][$i] ?>')"><i class="fas fa-trash"></i></a>
                        <a href="index.php?action=modifierQTeArticle" name="modifier" class="btn btn-success"><i class="fas fa-pen"></i></a>
                        </td>

                    </tr>
                <?php
                }
                ?>

                <tr>
                    <th>Total du panier</th>
                    <td colspan="6"><?php
                                    $totalPanier = 0;
                                    for ($i = 0; $i < count($_SESSION['panier']['nom_article']); $i++) {
                                        $totalPanier += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix_article'][$i];
                                    }
                                    ?> <?= $totalPanier ?>.00€</td>

                </tr>
            <?php
            }
            ?>
  
    </tbody>
</table>



<button><a href="index.php" class="btn btn-success" >Continuez vos achats?</a></button>
<button name="pay" type="submit" class="card-link btn btn-danger" style="background-color: red;">Payer</button>
</form>
<?php

// session_destroy();
$content = ob_get_clean();

require_once('./views/gabarit.php');
?>
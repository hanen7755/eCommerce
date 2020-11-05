<?php


    if(isset($_POST['commander'])){
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);
        require_once('mail.php');
    }


ob_start();
?>
<div class="container">
    <div class="row">
        <div class="offset-3 col-6">
            <h1 class="h2">Commande du véhicule </h1>
            
            <?php if(isset($_POST['commander'])){if($mail->send()){ ?>
            <div class="alert alert-success">Votre commande est prise en compte</div>
            <?php  }} ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input class="form-control" type="text" name="nom" placeholder="Entrer votre nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input class="form-control" type="text" name="prenom" placeholder="Entrer votre prenom">
                </div>
                <div class="form-group">
                    <label for="nom">Email:</label>
                    <input class="form-control" type="text" name="email" placeholder="Entrer votre email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <button name="commander" type="submit" class="btn btn-primary btn-block">Soumettre</button>
            </form>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once('gabarit.php');

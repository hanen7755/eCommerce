<?php
ob_start();
?>
<h1>Page d'erreur</h1>
<div class="alert alert-warning text-center">
    <strong><?=$errorMsg;?></strong>
</div>

<p><a href="./index.php">Retour à l'accueil</a></p>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
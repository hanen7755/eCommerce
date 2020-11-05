<?php

ob_start();
?>
<div class="row">
    <div class="col">
    </div>
    <div class="col">
     <ul class="list-group">
         <li class="list-group-item">Nom: <?=$nom_article ?></li>
         <li class="list-group-item">Prix: <span class="bagde badge-danger"><?=$prix_article ?></span</li>
         
     </ul>
     <br>
     <div class="text-center">
        <form action="index.php?action=pay" method="post">
            <input type="hidden" name="id_article" value="<?=$id_article;?>">
            <input type="hidden" name="prix_article" value="<?=$prix_article;?>">

            
            <script 
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="pk_test_51HXTHVH5Lxf9l8Yn0q6E7O7NEzs4XNTSNAxpM4WEk2S4o1Ux8dZ6Zo8AHWAIcOVejncEqyDoNVgGl82MSrGZdY3o00pbOsr243"
            data-name="Article"
            data-description="Les derniers articles  de l'année"
            data-image="https://img2.freepng.fr/20180410/pyw/kisspng-the-mp-car-group-car-dealership-vehicle-auto-detai-car-logo-5acc63ad412f59.047531031523344301267.jpg"
            data-amount="<?=$prix_article; ?>00"
            data-locale="fleur"
            data-currency="eur"
            data-billing-address="true"
            data-label="Paiement par carte"
            >

            </script>
        </form>
    </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once('./views/gabarit.php');
?>
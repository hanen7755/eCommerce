<?php 
           //créer un panier avec la $_SESSION
          function creationPanier(){
            if(!isset($_SESSION['panier'])){
        
                $_SESSION['panier']=array();
                $_SESSION['panier']['nom_article']=array();
                $_SESSION['panier']['quantite']=array();
                $_SESSSION['panier']['prix_article']=array();
                $_SESSION['panier']['verrou'] = false;
                $select = $db->query("SELECT tva FROM article");
                $tva = $select->fetch(PDO::FETCH_OBJ);
                $_SESSION['panier']['tva'];
            }
                return true;
        }
        
        
        
         function ajoutPanier($nom_article,$quantite,$prix_article){
        
                
            if(creationPanier() && !isVerouille()){ // test si le panier existe + test l'existance du post [’ajoutPanier']
        
                //Si le produit existe déjà on ajoute seulement la quantité
                $position_produit = array_search($nom_article,$_SESSION['nom_article']);
                ///on verifie si le produit n existe pas deja dans le panier si oui ajout quantite
                if ($position_produit  !==  false){ //différent ou bien s'ils ne sont pas du même type.
                   
                    $_SESSION['panier']['nom_article'][$position_produit] += $quantite ; //test si l'article existe ajouter la quantité
                }
              
                else
                {
                    //Sinon on ajoute le produit
                    array_push( $_SESSION['panier']['nom_article'],$nom_article);
                    array_push( $_SESSION['panier']['quantite'],$quantite);
                    array_push( $_SESSION['panier']['prix_article'],$prix_article);
                }
                }else{
                echo'Erreur,veuillez contacter l\'administrateur';
            }
            require_once('./views/public/listPanier.php');
        }
         
           function ModifierQTeProduit($nom_article,$quantite){
            if(creationPanier() && !isVerouille()){
        
                if($quantite>0){
                    $position_produit = array_search($_SESSION['panier']['nom_article'],$nom_article);
        
                    if($position_produit!==false){
                        $_SESSION['panier']['nom_article'][$position_produit] = $quantite;
                    }
                }else{
                    supprimerArticle($nom_article);
                }
            }else{
                    echo'Erreur, veuillez contacter un administrateur';
                }
            }
            function supprimerArticle($nom_article){
                if(creationPanier() && !isVerouille()){

                    $tmp = array();
                    $tmp['nom_article'] = array();
                    $tmp['quantite'] = array();
                    $tmp['prix_article'] = array();
                    $tmp['verrou'] = array();

                    for($i=0; $i<count($_SESSION['panier']['nom_article']); $i++){
                            if($_SESSION['panier']['nom_article'][$i] !== $nom_article){
                    array_push( $_SESSION['panier']['nom_article'],$_SESSION['panier']['nom_article'][$i]);
                    array_push( $_SESSION['panier']['quantite'],$_SESSION['panier']['quantite'][$i]);
                    array_push( $_SESSION['panier']['prix_article'],$_SESSION['panier']['prix_article'][$i]);
                            }
                    }
                    $_SESSION['panier'] = $tmp;
                    unset($tmp);
                }else{
                    echo'veuillez contacter un administrateur';
                }
            }

            function montantGlobal(){
                $total = 0;
                for($i=0; $i<count($_SESSION['panier']['nom_article']); $i++){
                    $total += $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix_article'];
                }
                return $total;
            }
            function montantGlobalTVA(){
                $total = 0;
                for($i=0; $i<count($_SESSION['panier']['nom_article']); $i++){
                    $total += $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix_article'];
                }
                return $total + $total*$_SESSION['panier']['tva']/100;
            }
            function supprimerPanier(){
                if(isset($_SESSION['panier'])){
                    unset($_SESSION['panier']);
                }
            }
            function isVerouille(){
                if(isset($_panier['panier']) && $_SESSION['isVerouille']){
                    return true;
                }else{
                    return false;
                }
            }

            function compterArticle(){
                if(isset($_SESSION['panier'])){
                    return count($_SESSION['panier']['nom_article']);
                }else{
                    return 0;
                }
            }
            
?>
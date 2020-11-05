<?php 
session_start();
require_once('./models/admin/AdminCategoriesModel.php'); 
require_once('./models/admin/AdminArticleModel.php'); 
require_once('./assets/librairie/vendor/autoload.php');
require_once('./models/admin/AdminPanierModel.php');
require_once('./models/public/PublicModel.php');
 
class PublicController{ 
 
    private $driver1; 
    private $driver2; 
    private $driver3; 
    private $driver4;

    public function __construct() 
    {
        $this->driver1 = new AdminCategoriesModel();  
        $this->driver2 = new AdminArticleModel(); 
        $this->driver3 = new PublicModel();
        $this->driver4 = new AdminPanierModel();
    } 
 
    public function getData(){ 
        $datasCat = $this->driver1->getCategories(); 
        $datasArticle = $this->driver2->getArticle(); 
        require_once('./views/public/listData.php'); 
    } 
 
    public function checkout(){ 
        if(isset($_POST['pay'])){ 
            // $image = $_POST['image']; 
            $nom_article = $_POST['nom_article']; 
            $prix_article = $_POST['prix_article']; 

 
            require_once('./views/public/viewCheckout.php'); 
        } 
    } 
 
    public function payment(){ 
        if(isset($_POST) && !empty($_POST['stripeToken'])){ 
            $token = $_POST['stripeToken']; 
            $prix_article = $_POST['prix_article'];   
            $nom_article = $_POST['nom_article']; 
            $numero = uniqid(); 
         
            \Stripe\Stripe::setApiKey("sk_test_51HXTHVH5Lxf9l8YnkrnffcHHbSdly9K17WQxwYQ5GBlseZSfzzQBC1m3lgu5H7LGqL3NzvVUJ2nKy4KEFmwn1UJq00l2hPrcnx"); 
            $charge = \Stripe\Charge::create([ 
                'amount'=>$prix_article.'00', 
                'currency'=>'eur', 
                'description'=>'Ventes de produits de beauté', 
                'source'=>$token 
            ]); 
         
             
           if($charge['captured']){ 
                
               $nb = $this->driver3->switchEtat(0,$nom_article); 
               if($nb){ 
                //require_once('billing.php'); 
                header('location:index.php'); 
               } 
           } 
        }
    }
    public function listPanier(){
        $datasPanier = $this->driver4->getPanier();
        require_once('./views/public/listPanier.php');
    }
    public function creationPanier(){
        if(!isset($_SESSION['panier'])){
    
            $_SESSION['panier']=array();
            $_SESSION['panier']['id_article']=array();
            $_SESSION['panier']['nom_article']=array();
            $_SESSION['panier']['quantite']=array();
            $_SESSION['panier']['prix_article']=array();
            // $_SESSION['panier']['verrou'] = false;
        }
            return true;
    }
   
    public function ajoutPanier(){
        
                
      
            if($this->creationPanier() && isset($_POST['ajoutPanier'])){

            $positionProduit = array_search($_POST['id_article'],  $_SESSION['panier']['id_article']);
            ///on verifie si le produit n existe pas deja dans le panier si oui ajout quantite
            if ($positionProduit  !==  false){ //différent ou bien s'ils ne sont pas du même type.
               
                $_SESSION['panier']['quantite'][$positionProduit] += $_POST['quantite'] ; //test si l'article existe ajouter la quantité
            }
          
            else
            {
                //Sinon on ajoute le produit
                array_push( $_SESSION['panier']['id_article'],$_POST['id_article']);
                array_push( $_SESSION['panier']['nom_article'],$_POST['nom_article']);
                array_push( $_SESSION['panier']['quantite'],$_POST['quantite']);
                array_push( $_SESSION['panier']['prix_article'],$_POST['prix_article']);
            }
            }else{
            echo'Erreur,veuillez contacter l\'administrateur';
        }
        require_once('./views/public/listPanier.php');
    }
     
    //    public function ModifierQTeProduit($nom_article,$quantite){
    //     if(creationPanier() && !isVerouille()){
    
    //         if($quantite>0){
    //             $position_produit = array_search($_SESSION['panier']['nom_article'],$nom_article);
    
    //             if($position_produit!==false){
    //                 $_SESSION['panier']['nom_article'][$position_produit] = $quantite;
    //             }}
    //         // }else{
    //         //     supprimerArticle($nom_article);
    //         // }
    //     }else{
    //             echo'Erreur, veuillez contacter un administrateur';
    //         }
    //     }
    //     public function supprimerArticle($nom_article){
    //         //if(creationPanier() && !isVerouille()){
    //             if(creationPanier()){
    //             $tmp = array();
    //             $tmp['id_article'] = array();
    //             $tmp['nom_article'] = array();
    //             $tmp['quantite'] = array();
    //             $tmp['prix_article'] = array();
    //             // $tmp['verrou'] = array();

    //             for($i=0; $i<count($_SESSION['panier']['nom_article']); $i++){
    //                     if($_SESSION['panier']['nom_article'][$i] !== $nom_article){
    //                         array_push( $_SESSION['panier']['id_article'],$_SESSION['panier']['id_article'][$i]);
    //             array_push( $_SESSION['panier']['nom_article'],$_SESSION['panier']['nom_article'][$i]);
    //             array_push( $_SESSION['panier']['quantite'],$_SESSION['panier']['quantite'][$i]);
    //             array_push( $_SESSION['panier']['prix_article'],$_SESSION['panier']['prix_article'][$i]);
    //                     }
    //             }
    //             $_SESSION['panier'] = $tmp;
    //             unset($tmp);
    //         }else{
    //             echo'veuillez contacter un administrateur';
    //         }
    //     }

        public function montantGlobal(){
            $total = 0;
            for($i=0; $i<count($_SESSION['panier']['nom_article']); $i++){
                $total += $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix_article'];
            }
            return $total;
        }
        // public function montantGlobalTVA(){
        //     $total = 0;
        //     for($i=0; $i<count($_SESSION['panier']['nom_article']); $i++){
        //         $total += $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix_article'];
        //     }
        //     return $total + $total*$_SESSION['panier']['tva']/100;
        // }
        public function supprimerPanier(){
            if(isset($_SESSION['panier'])){
                unset($_SESSION['panier']);
            }
        }
        public function isVerouille(){
            if(isset($_panier['panier']) && $_SESSION['isVerouille']){
                return true;
            }else{
                return false;
            }
        }

        public function compterArticle(){
            if(isset($_SESSION['panier'])){
                return count($_SESSION['panier']['nom_article']);
            }else{
                return 0;
            }
        }
        

}
  

    ?>

<?php
session_start();
require_once('./models/Driver.php');
require_once('./models/Panier.php');
require_once('./models/Article.php');


class AdminPanierModel extends Driver{

  

    public function getPanier(){
        $sql = "SELECT * FROM panier";
        $res = $this->getRequest($sql);
        
        $datasPanier = $res->fetchAll(PDO::FETCH_OBJ);
        $tabPanier= [];

        foreach($datasPanier as $data){
            $panier = new Panier();
            $panier->setId_panier($data->id_panier);
            $panier->setNom_article($data->nom_article);
            $panier->setPrix_article($data->prix_article);
            $panier->setQuantite($data->quantite);
            $panier->setDate_created_panier($data->date_created_panier);
            array_push($tabPanier,$panier);

        }
        
        return $tabPanier;
    }
}
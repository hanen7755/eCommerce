<?php

require_once('./models/Categories.php');
require_once('./models/Driver.php');

class AdminCategoriesModel extends Driver{
    
    public function getCategories(){
        $sql = "SELECT * FROM categories";
        $res = $this->getRequest($sql);
        $rows = $res->fetchAll(PDO::FETCH_OBJ);
        
        $donnees = [];
   
        foreach($rows as $row){
            $cat  = new Categories();
            $cat->setId_categorie($row->id_categorie);
            $cat->setNom_categorie($row->nom_categorie);
            array_push($donnees,$cat);
        }
        return $donnees;
    }

    public function addCategories(Categories $cat){
        $sql = "INSERT INTO categories(nom_categorie) VALUES(:nom)";
        $res = $this->getRequest($sql,['nom'=>$cat->getNom_categorie()]);
        return $res;
    }

    public function deleteCategories($id){
        $sql = "DELETE FROM categories WHERE id_categorie = ?";
        $res = $this->getRequest($sql,[$id]);
        $nb = $res->rowCount();
        return $nb;
    }
}

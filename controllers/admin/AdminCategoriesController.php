<?php

require_once('./models/admin/AdminCategoriesModel.php');


class AdminCategoriesController{

    private $driver;

    public function __construct()
    {
        $this->driver = new AdminCategoriesModel();
    }
    public function listCategories(){
        
            $datas = $this->driver->getCategories();
            require_once('./views/admin/listCategories.php');
        
    }
    public function insertCat(){
   
        if(isset($_POST['ajout']) && !empty($_POST['cat'])){
            $nom_categorie = trim(htmlspecialchars($_POST['cat']));
            
            $newCat = new Categories();
            $newCat->setNom_categorie($nom_categorie);
            $res = $this->driver->addCategories($newCat);
            
            if($res){
                header('location:index.php?action=list_cat');
            }
        }
        require_once('./views/admin/ajoutCategories.php');
        
    }

    public function removeCat($id){

        $n = $this->driver->deleteCategories($id);
        //die($n);
        if($n){
            header('location:index.php?action=list_cat');
        }

    }
}


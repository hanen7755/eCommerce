<?php

require_once('./models/Categories.php');
require_once('./models/Article.php');
require_once('./models/Driver.php');
require_once('./models/admin/AdminArticleModel.php');
require_once('./models/admin/AdminCategoriesModel.php'); 


class AdminArticleController{
    private $driver;
    private $driver2; 
    public function __construct()
    {
        $this->driver = new AdminArticleModel();
        $this->driver2 = new AdminCategoriesModel(); 
        
    }

    public function listArticle(){

        if(isset($_POST['envoi'])){ 
            $search = trim(htmlentities(addslashes($_POST['search']))); 
            $rows = $this->driver->getArticle(null,$search); 
            require_once('./views/admin/listArticle.php'); 
 
        }elseif (isset($_GET['id'])) { 
 
            $id = (int)$_GET['id']; 
            $row = $this->driver->getArticle($id); 
            require_once('./views/admin/detailArticle.php'); 
 
        }else{ 
 
            $rows = $this->driver->getArticle(); 
            require_once('./views/admin/listArticle.php'); 
        } 
    }
    public function removeArticle(){ 
       
        if(isset($_GET['image']) && isset($_GET['id'])){ 
            $image = $_GET['image']; 
            $id = (int)$_GET['id']; 
            $n = $this->driver->deleteArticle($id); 
            if($n){ 
                $fichier = './assets/images/'.$image; 
                unlink($fichier); 
                header('location:index.php?action=list_article'); 
             } 
            } 
         
    } 
    public function insertArticle(){ 
        if(isset($_POST['soumis']) && !empty($_POST['nom_article']) && !empty($_POST['prix_article'])){ 
 
            $nom_article = trim(htmlentities(addslashes($_POST['nom_article']))); 
            $prix_article = (int)trim(htmlentities(addslashes($_POST['prix_article']))); 
            $description_article = trim(htmlentities(addslashes($_POST['description_article']))); 
            $stock = trim(htmlentities(addslashes($_POST['stock']))); 
            $promotion = trim(htmlentities(addslashes($_POST['promotion'])));
            $id_categorie = trim(htmlentities(addslashes($_POST['id_categorie'])));
            $image = $_FILES['image']['name']; 
         
            $destination = './assets/images/'; 
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image); 
         
            $article = new Article(); 
             
            
            $article->setNom_article($nom_article); 
            $article->setPrix_article($prix_article); 
            $article->setDescription_article($description_article);
            $article->setStock($stock); 
            $article->setPromotion($promotion);
            $article->setId_categorie($id_categorie); 
            $article->setImage($image);
            $nb = $this->driver->addArticle($article); 
         
            if($nb){ 
                header('location:index.php?action=list_article'); 
            }else{ 
                echo "Echec lors de l'insertion"; 
            } 
         
        } 
 
        $datas = $this->driver2->getCategories(); 
        require_once('./views/admin/ajoutArticle.php'); 
     
    } 
         
    public function editArticle(){ 

        if(isset($_GET['id'])){ 
            $id = (int)$_GET['id']; 
            $row = $this->driver->getArticle($id); 
 
            if(isset($_POST['soumis']) && !empty($_POST['nom_article'])){ 
           
                $nom_article=trim(htmlentities(addslashes($_POST['nom_article']))); 
                $prix_article=(int)trim(htmlentities(addslashes($_POST['prix_article']))); 
                $description_article=trim(htmlentities(addslashes($_POST['description_article']))); 
                $stock=(int)trim(htmlentities(addslashes($_POST['stock']))); 
                $promotion=(int)trim(htmlentities(addslashes($_POST['promotion']))); 

                $image=$_FILES['image']['name']; 
             
                $destination='./assets/images/'; 
                move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image); 
               
            
             
            $row[0]->setNom_article($nom_article); 
            $row[0]->setPrix_article($prix_article); 
            $row[0]->setDescription_article($description_article); 
            $row[0]->setStock($stock); 
            $row[0]->setPromotion($promotion); 
            $row[0]->setImage($image); 
              
            $nb = $this->driver->modifArticle($row[0]); 
            if($nb){ 
                header('location:index.php?action=list_article'); 
            } 
            } 
     
                $datas = $this->driver2->getCategories(); 
                require_once('./views/admin/modifArticle.php'); 
        } 
       
    } 
}

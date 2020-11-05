<?php

//extends -> recupere propriété et méthode de la classe driver
class AdminArticleModel extends Driver{

    public function getArticle($id = null,$search = null){

       if(!empty($search)){
            $sql = "SELECT * FROM article a 
            INNER JOIN categories c 
            ON a.id_categorie = c.id_categorie";
            // cle primaire =>a.id_categ et cle etrangere c.id_cat
            $res = $this->getRequest($sql);
            //getREQUEST RECUPERE DONNEE=>methode dans driver
            $tabSearch = ["$search%","$search%","$search%","$search%",];
                   
            $res = $this->getRequest($sql,$tabSearch);
        }else if(!empty($id)){

            $sql = "SELECT*FROM article WHERE id_article = ?"; 
            $res = $this->getRequest($sql,[$id]);
        }else{
        $sql = "SELECT * FROM article";
        $res = $this->getRequest($sql);

        }
        //fetchAll -> recupere tout dans un tableau
        $lines = $res->fetchAll(PDO::FETCH_OBJ);
        $datas =[];

        //foreach=methode pour boucler et array_push pour envoyer le tout dans le tableau datas
        //mapping= recupere donnee qu on renvoit dans le tableau/mis a jour du tableau/
        foreach($lines as $line){
            $article = new Article();//nouvelle instance Article
            $article->setId_article($line->id_article);
            $article->setNom_article($line->nom_article);
            $article->setPrix_article($line->prix_article);
            $article->setId_article($line->id_article);
            $article->setDescription_article($line->description_article);
            $article->setImage($line->image);
            $article->setDate_created_article($line->date_created_article);
            $article->setStock($line->stock);
            $article->setpromotion($line->promotion);
            $article->etat=$line->etat;
            $article->setId_categorie($line->id_categorie);
            array_push($datas,$article);
        }
            return $datas;
           //var_dump($datas);
    }
    public function getNameCat($id){

        $sql = "SELECT * FROM categories WHERE id_categorie = ?";
        $res = $this->getRequest($sql,[$id]);
        $data = $res->fetch(PDO::FETCH_OBJ);

        $cat = new Categories();
        if($res->rowCount()){
            $cat->setId_categorie($data->id_cat);
            $cat->setNom_categorie($data->nom_cat);
        }
        return $cat;
    }
    public function deleteArticle($id){
        $sql = "DELETE FROM article WHERE id_article = ?";
        $res = $this->getRequest($sql,[$id]);
        $nb = $res->rowCount();
        return $nb;
    }
    public function addArticle(Article $article){

        $sql = "INSERT INTO article( nom_article, prix_article, description_article, stock, promotion, id_categorie, image)
                VALUES(?,?,?,?,?,?,?)";

        $tabParam = [$article->getNom_article(),$article->getPrix_article(),$article->getDescription_article(),$article->getStock(),
        $article->getPromotion(),$article->getId_categorie(),$article->getImage()];
        $res = $this->getRequest($sql,$tabParam);

        return $res;

    }
    public function modifArticle(Article $article){
        if($article->getImage() === ""){
            $sql="UPDATE article
                SET nom_article=?,prix_article=?,description_article=?,stock=?,promotion=?
                WHERE id_article=? ";
             $tabArticle = [$article->getNom_article(),$article->getPrix_article(),$article->getDescription_article(),$article->getStock(),$article->getPromotion(),$article->getId_article()
             ];
             
        }else{
            $sql="UPDATE article
                    SET nom_article=?, prix_article=?, description_article=? ,image=? ,stock=? ,promotion=?
                    WHERE id_article=? ";
             $tabArticle = [$article->getId_article(),$article->getNom_article(),$article->getPrix_article(),$article->getDescription_article(),$article->getImage(),$article->getStock(),$article->getPromotion()
             ];
             
        }

        $res=$this->getRequest($sql,$tabArticle);
        return $res->rowCount();
    }

}
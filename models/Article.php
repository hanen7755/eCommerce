<?php

class Article{
    private $id_article;
    private $nom_article;
    private $prix_article;
    private $description_article;
    private $image;
    private $date_created_article;
    private $stock;
    private $promotion;
    private $id_categorie;
    private $id_commande;




    /**
     * Get the value of id_article
     */ 
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */ 
    public function setId_article($id_article)
    {
        $this->id_article = $id_article;

        return $this;
    }

    /**
     * Get the value of nom_article
     */ 
    public function getNom_article()
    {
        return $this->nom_article;
    }

    /**
     * Set the value of nom_article
     *
     * @return  self
     */ 
    public function setNom_article($nom_article)
    {
        $this->nom_article = $nom_article;

        return $this;
    }

    /**
     * Get the value of prix_article
     */ 
    public function getPrix_article()
    {
        return $this->prix_article;
    }

    /**
     * Set the value of prix_article
     *
     * @return  self
     */ 
    public function setPrix_article($prix_article)
    {
        settype($prix, "integer");
        $this->prix_article = $prix_article;

        return $this;
    }

    /**
     * Get the value of description_article
     */ 
    public function getDescription_article()
    {
        return $this->description_article;
    }

    /**
     * Set the value of description_article
     *
     * @return  self
     */ 
    public function setDescription_article($description_article)
    {
        $this->description_article = $description_article;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of date_created_article
     */ 
    public function getDate_created_article()
    {
        return $this->date_created_article;
    }

    /**
     * Set the value of date_created_article
     *
     * @return  self
     */ 
    public function setDate_created_article($date_created_article)
    {
        $this->date_created_article = $date_created_article;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of promotion
     */ 
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set the value of promotion
     *
     * @return  self
     */ 
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get the value of id_categorie
     */ 
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */ 
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    /**
     * Get the value of id_commande
     */ 
    public function getId_commande()
    {
        return $this->id_commande;
    }

    /**
     * Set the value of id_commande
     *
     * @return  self
     */ 
    public function setId_commande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

}





?>
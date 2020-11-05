<?php


class Categories{
    private $id_categorie;
    private $nom_categorie;
    private $date_created_cat;

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
     * Get the value of nom_categorie
     */ 
    public function getNom_categorie()
    {
        return $this->nom_categorie;
    }

    /**
     * Set the value of nom_categorie
     *
     * @return  self
     */ 
    public function setNom_categorie($nom_categorie)
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    /**
     * Get the value of date_created_cat
     */ 
    public function getDate_created_cat()
    {
        return $this->date_created_cat;
    }

    /**
     * Set the value of date_created_cat
     *
     * @return  self
     */ 
    public function setDate_created_cat($date_created_cat)
    {
        $this->date_created_cat = $date_created_cat;

        return $this;
    }
}

?>
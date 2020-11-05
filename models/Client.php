<?php

class Client{

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $adresse_client;
    private $mail_client;
    private $tel_client;
    private $date_created_client;

    /**
     * Get the value of id_client
     */ 
    public function getId_client()
    {
        return $this->id_client;
    }

    /**
     * Set the value of id_client
     *
     * @return  self
     */ 
    public function setId_client($id_client)
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * Get the value of nom_client
     */ 
    public function getNom_client()
    {
        return $this->nom_client;
    }

    /**
     * Set the value of nom_client
     *
     * @return  self
     */ 
    public function setNom_client($nom_client)
    {
        $this->nom_client = $nom_client;

        return $this;
    }

    /**
     * Get the value of prenom_client
     */ 
    public function getPrenom_client()
    {
        return $this->prenom_client;
    }

    /**
     * Set the value of prenom_client
     *
     * @return  self
     */ 
    public function setPrenom_client($prenom_client)
    {
        $this->prenom_client = $prenom_client;

        return $this;
    }

    /**
     * Get the value of adresse_client
     */ 
    public function getAdresse_client()
    {
        return $this->adresse_client;
    }

    /**
     * Set the value of adresse_client
     *
     * @return  self
     */ 
    public function setAdresse_client($adresse_client)
    {
        $this->adresse_client = $adresse_client;

        return $this;
    }

    /**
     * Get the value of mail_client
     */ 
    public function getMail_client()
    {
        return $this->mail_client;
    }

    /**
     * Set the value of mail_client
     *
     * @return  self
     */ 
    public function setMail_client($mail_client)
    {
        $this->mail_client = $mail_client;

        return $this;
    }

    /**
     * Get the value of tel_client
     */ 
    public function getTel_client()
    {
        return $this->tel_client;
    }

    /**
     * Set the value of tel_client
     *
     * @return  self
     */ 
    public function setTel_client($tel_client)
    {
        $this->tel_client = $tel_client;

        return $this;
    }

    /**
     * Get the value of date_created_client
     */ 
    public function getDate_created_client()
    {
        return $this->date_created_client;
    }

    /**
     * Set the value of date_created_client
     *
     * @return  self
     */ 
    public function setDate_created_client($date_created_client)
    {
        $this->date_created_client = $date_created_client;

        return $this;
    }
}
<?php
class User{

    private $id_user;
    private $nom_user;
    private $prenom_user;
    private $mail_user;
    private $login;
    private $pass;
    private $role;
    private $date_created_user;

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of nom_user
     */ 
    public function getNom_user()
    {
        return $this->nom_user;
    }

    /**
     * Set the value of nom_user
     *
     * @return  self
     */ 
    public function setNom_user($nom_user)
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    /**
     * Get the value of prenom_user
     */ 
    public function getPrenom_user()
    {
        return $this->prenom_user;
    }

    /**
     * Set the value of prenom_user
     *
     * @return  self
     */ 
    public function setPrenom_user($prenom_user)
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    /**
     * Get the value of mail_user
     */ 
    public function getMail_user()
    {
        return $this->mail_user;
    }

    /**
     * Set the value of mail_user
     *
     * @return  self
     */ 
    public function setMail_user($mail_user)
    {
        $this->mail_user = $mail_user;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of date_created_user
     */ 
    public function getDate_created_user()
    {
        return $this->date_created_user;
    }

    /**
     * Set the value of date_created_user
     *
     * @return  self
     */ 
    public function setDate_created_user($date_created_user)
    {
        $this->date_created_user = $date_created_user;

        return $this;
    }
}
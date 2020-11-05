<?php

require_once('./models/User.php');
require_once('./models/Driver.php');


class AdminUserModel extends Driver 
{
    public function getUser()
    {
        $sql = "SELECT * FROM user";
        $res = $this->getRequest($sql);
        $rows = $res->fetchAll(PDO::FETCH_OBJ);
        $donnees = [];

        foreach ($rows as $row) {
            $user  = new User();

            $user->setId_user($row->id_user);
            $user->setNom_user($row->nom_user);
            $user->setPrenom_user($row->prenom_user);
            $user->setMail_user($row->mail_user);
            $user->setLogin($row->login);
            $user->setRole($row->role);
            array_push($donnees, $user);
        }
        return $donnees;
    }
    public function addUser(User $user)
    {
        $req = "SELECT * FROM user WHERE mail_user = ?";
        $res2 = $this->getRequest($req, [$user->getMail_user()]);

        if ($res2->rowCount() == 0) {
            $sql = "INSERT INTO user(nom_user, prenom_user,mail_user, login,pass,role)
                VALUES(?,?,?,?,?,?)";
            $tabUser = [$user->getNom_user(), $user->getPrenom_user(), $user->getMail_user(), $user->getLogin(), $user->getPass(), $user->getRole()];
           
            $res2 = $this->getRequest($sql, $tabUser);
            if ($res2) {
                header('location:index.php?action=list_user');
            }
            return "";
        } else {
            return "Ce compte existe déjà...";
        }
    }
    public function deleteUser($id){
        $sql = "DELETE FROM user WHERE id_user= ?";
        $res = $this->getRequest($sql,[$id]);
        $nb = $res->rowCount();
        return $nb;
    }
    

    public function changeStatut($statut, $id)
    {

        $sql = "UPDATE user SET statut = ? WHERE id_user = ?";
        
        $res = $this->getRequest($sql, [$statut, $id]);

        return $res->rowCount();
    }
    public function signIn($login, $pass)
    {
        $sql = "SELECT * FROM user WHERE (login = :login OR mail_user = :login) AND pass = :pass";
        $res = $this->getRequest($sql, ['login' => $login, 'pass' => $pass]);
        return $res;
    }
}
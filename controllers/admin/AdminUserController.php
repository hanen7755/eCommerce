<?php

require_once('./models/admin/AdminUserModel.php');

class AdminUserController{

    private $driver;

    public function __construct()
    {
        $this->driver = new AdminUserModel();
    }

    public function listUsers(){
        $datas = $this->driver->getUser();
        require_once('./views/admin/listUser.php');
    }
    public function insertUser()
    {
        if (isset($_POST['envoi']) && strlen($_POST['login']) > 4 && filter_var($_POST['mail_user'], FILTER_VALIDATE_EMAIL)) {

            $nom_user = trim(htmlentities(addslashes($_POST['nom_user'])));
            $prenom_user = trim(htmlentities(addslashes($_POST['prenom_user'])));
            $mail_user = trim(htmlentities(addslashes($_POST['mail_user'])));
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            if (isset($_POST['admin'])) {
                $role = (int)$_POST['admin'];
            } else {
                $role = 2;
            }


            $user = new User();

            $user->setNom_user($nom_user);
            $user->setPrenom_user($prenom_user);
            $user->setMail_user($mail_user);
            $user->setLogin($login);            
            $user->setPass($pass);
            $user->setRole($role);

            $error = $this->driver->addUser($user);
        }
        require_once('./views/admin/formulaireUser.php');
    
    }
    public function SupprimerUser($id){
            $n = $this->driver->deleteUser($id); 
            if($n){ 
                header('location:index.php?action=list_user'); 
             } 
            }
             public function login()
             {
         
                 if (isset($_POST['envoi']) && strlen($_POST['pass']) >= 4 && !empty($_POST['login'])) {
                     $login = trim(htmlentities(addslashes($_POST['login'])));
                     $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                     $res = $this->driver->signIn($login, $pass);
                     if ($res->rowCount()) {
                         $rows = $res->fetch(PDO::FETCH_OBJ);
                         if ($rows->statut == 1) {
                             session_start();
                             $_SESSION['Auth'] = $rows;
                             header('location:index.php?action=list_fleur');
                         } else {
                             $error = "Ce compte a été suspendu";
                         }
                     } else {
                         $error =  "Identifiant et mot de passe ne correspondent pas";
                     }
                 }
                 require_once('./views/admin/authent.php'); 
    }
}
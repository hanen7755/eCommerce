<?php
abstract class Driver{ // ne peut pas être instancie : les classes fille auront accées
    private static $connex; //instance de pdo (est une chaine de connexion)


    protected function getRequest($sql, $params = null){ 
      $resultat =  self::getConnex()->prepare($sql);
      $resultat->execute($params);
      return $resultat; 
    }

// methode privé qui crée une instance si celle-ci n'existe pas 
    private static function getConnex(){
           

        if(self::$connex === null){
            self::$connex = new PDO('mysql:host=localhost;dbname=mrs_and_ladys','root','');
            self::$connex->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$connex; // self veut dire que c'est un attribut de class
    }
    
}

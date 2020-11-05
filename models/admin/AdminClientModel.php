<?php

require_once('./models/Client.php');
require_once('./models/Driver.php');

class AdminClientModel extends Driver{

    public function getClient(){
        $sql = "SELECT *FROM client";
        $res = $this->getRequest($sql);
        $rows = $res->fetchAll(PDO::FETCH_OBJ);

        $donnees = [];

        foreach($rows as $row){
            $client = new Client();
            $client->setId_client($row->id_client);
            $client->setNom_client($row->nom_client);
            $client->setAdresse_client($row->adresse_client);
            $client->setMail_client($row->mail_client);
            $client->setTel_client($row->tel_client);
            $client->setDate_created_client($row->date_created_client);
            array_push($donnees,$client);
        }
        return $donnees;
    }
    public function deleteClient($id){
        $sql = "DELETE FROM client WHERE id_client = ?";
        $res = $this->getRequest($sql,[$id]);
        $nb = $res->rowCount();
        return $nb;
    }
}
<?php 

require_once('./models/admin/AdminClientModel.php');


class AdminClientController{

    private $driver;

    public function __construct()
    {
        $this->driver = new AdminClientModel();
    }
    public function listClient(){
        $datas = $this->driver->getClient();
        require_once('./views/admin/listClient.php');
    }
    public function removeClient($id){
        $n = $this->driver->deleteClient($id);
        //die($n);
        if($n){
            header('location:index.php?action=list_client');
        }

    }
}
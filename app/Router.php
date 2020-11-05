<?php
session_start();
require_once('./controllers/admin/AdminArticleController.php');
require_once('./controllers/admin/AdminCategoriesController.php');
require_once('./controllers/admin/AdminUserController.php');
require_once('./controllers/admin/AdminClientController.php');
require_once('./controllers/public/PublicController.php');




class Router{
    private $ctraa;
    private $ctrac;
    private $ctrau;
    private $ctracl;
    private $ctrpub;


    public function __construct()
    {
        $this->ctrac = new AdminCategoriesController();
        $this->ctraa = new AdminArticleController();
        $this->ctrau = new AdminUserController();
        $this->ctracl = new AdminClientController();
        $this->ctrpub = new PublicController();
    }

    public function getPath()
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list_cat':
                        $this->ctrac->listCategories();
                        break;
                    case 'add_cat':
                        $this->ctrac->insertCat();
                        break;
                    case 'delete_cat':
                        if (isset($_GET['id'])) {
                            $id = (int)$_GET['id'];
                            $this->ctrac->removeCat($id);
                        } else {
                            throw new Exception('paramètre non défini');
                        }
                        break;
                    case 'list_article':
                        $this->ctraa->listArticle();
                        break;
                    case 'delete_article':
                        $this->ctraa->removeArticle();
                        break;
                    case 'add_article':
                        $this->ctraa->insertArticle();
                        break;
                    case 'edit_article':
                        $this->ctraa->editArticle();
                        break;
                    case 'detail_article':
                        $this->ctraa->listArticle();
                        break;
                    case 'list_user':
                        $this->ctrau->listUsers();
                        break;
                    case 'register':
                        $this->ctrau->insertUser();
                        break;
                    case 'suppUser':
                        if (isset($_GET['id'])) {
                            $id = (int)$_GET['id'];
                            $this->ctrau->supprimerUser($id);
                        }
                        break;
                    case 'list_client':
                        $this->ctracl->listClient();
                        break;
                    case 'delete_client':
                        if (isset($_GET['id'])) {
                            $id = (int)$_GET['id'];
                            $this->ctracl->removeClient($id);
                        }
                        break;
                    case 'checkout':
                        $this->ctrpub->checkout();
                        break;
                    case 'pay':
                        $this->ctrpub->payment();
                        break;
                        //commande  test        
                    case 'list_panier';
                        $this->ctrpub->listPanier();
                        break;

                    case 'ajoutPanier':
                        $this->ctrpub->ajoutPanier();
                        break;

                    default:
                        throw new Exception('Url non définie');
                        break;
                }
            } else {
                $this->ctrpub->getData();
            }
        } catch (Exception $e) {
            $this->page404($e->getMessage());
        }
    }
    private function page404($errorMsg)
    {
        require_once('./views/page404.php');
    }
}

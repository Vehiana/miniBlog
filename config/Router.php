<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;

    public function __construct()
    {
        //instanciation du front et back Controller
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
    }
    public function run()
    {
        try {
            if (isset($_GET['route'])) {
                if ($_GET['route'] === 'article') {
                    //require '../templates/single.php';


                    //afficher l'article id ='...'
                    //grâce au frontController

                    $this->frontController->article($_GET['articleId']);

                }
                else {
                    //sinon afficher une erreur (erreur_404.php)
                    $this->errorController->errorNotFound();
                }
                if ($_GET['route'] === 'addComment') {

                    if (!empty($_POST['pseudo']) && !empty($_POST['content'])) {

                        $this->frontController->addComment($_GET['articleId'], $_POST['pseudo'], $_POST['content']);

                    }
                }

            }
            else {
                //require '../templates/home.php';

                //affiche la page d'accueil avec le FrontController
                $this->frontController->home();
            }
        }
        catch (Exception $e){
            //sinon afficher une erreur (erreur_505.php)
            $this->errorController->errorServer();
        }
    }
}
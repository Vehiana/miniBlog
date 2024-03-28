<?php

namespace App\src\controller;

class ErrorController
{

    public function errorNotFound()
    {

        //page non trouvé donc renvoie à la page d'erreur
        require '../templates/error_404.php';
    }

    public function errorServer()
    {
        //problème de serveur donc renvoie à la page d'erreur
        require '../templates/error_505.php';
    }
}
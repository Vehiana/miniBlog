<?php

//Pour toutes les classes dans DAO
namespace App\src\DAO;

//Uniquement pour la classe DAO
use PDO;
use Exception;

abstract class DAO
{

    //constantes(dans dev.php)


    //stocker la connection si celle_ci existe, sinon renvoie null
    private $connection;

    /*Méthode qui va vérifier si une connexion($connection) est présente ou non,
     et appelle getConnection() pour créer une nouvelle connexion
     si $connection existe la méthode renvoie la $connection*/
    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->connection === null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }
    /*Méthode pour se connecter à la base de données et
    renvoie la connexion dans la propriété $connexion*/
    private function getConnection()
    {
        //Tentative de connexion à la base de données
        try{
            //instanciation de la base de donnée utilisée avec new PDO()
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //On renvoie la connexion
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection) {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }

    // Vérifier si la connexion existe avant d'en faire une nouvelle au besoin
    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            //$result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        //$result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}

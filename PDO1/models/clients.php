<?php

/**
 * Création de la classe clients
 */
class clients {

    //Liste des attributs
    private $connexion;
    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $card;
    public $cardNumber;

    /**
     * Méthode construct
     */
    public function __construct() {
        //On test les erreurs avec le try/catch 
        //Si tout est bon, on est connecté à la base de donnée
        try {
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'abcd', '456');
        }
        //Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Méthode getClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsList() {
        $PDOResult = $this->connexion->query('SELECT `lastName`, `firstName` FROM `clients`');
        return $PDOResult->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode get20ClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function get20ClientsList() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `lastName`, `firstName` FROM `clients` LIMIT 20');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }return $result;
    }

    /**
     * Méthode getClientCards pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsCards() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `clients`.`firstName`, `clients`.`lastName`, `cards`.`cardTypesId` '
                . 'FROM `clients` '
                . 'INNER JOIN `cards` '
                . 'ON `clients`.`cardNumber` = `cards`.`cardNumber` '
                . 'WHERE `cards`.`cardTypesId` = 1');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode getMClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsByFirstLetterList() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `lastName`, `firstName` '
                . 'FROM `clients` '
                . 'WHERE `lastName` '
                . 'LIKE "M%" '
                . 'ORDER BY `lastName` ASC');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        } return $result;
    }

    /**
     * Méthode getMClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsDetails() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `clients`.`lastName`, `clients`.`firstName`, DATE_FORMAT(`clients`.`birthDate`, "%d/%m/%Y") AS `birthDate`, `clients`.`cardNumber`, `clients`.`card`, (CASE WHEN `cards`.`cardTypesId`= 1 THEN \'OUI\' ELSE \'NON\' END) AS `case` '
                . 'FROM `clients` '
                . 'LEFT JOIN `cards` '
                . 'ON `clients`.`cardNumber` = `cards`.`cardNumber`');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        } return $result;
    }

    /**
     * Méthode destruct
     */
    public function __destruct() {
        ;
    }

}

?>
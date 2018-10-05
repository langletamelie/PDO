<?php

class patients {

    private $connexion;
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

    public function __construct() {
//On test les erreurs avec le try/catch 
//Si tout est bon, on est connecté à la base de donnée
        try {
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'abcd', '456');
        }
//Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addPatient() {
        $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $insertPatient = $this->connexion->prepare($query);
        $insertPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $insertPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $insertPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $insertPatient->execute();
    }
    
      public function checkIfPatientExist() {
        $result = array();
        $patient = $this->connexion->prepare('SELECT * FROM `patients` WHERE `lastname` = :lastname AND `firstname` = :firstname AND `birthDate` = :birthDate AND `phone` = :phone AND `mail` = :mail');
        // :bidule = marqueur nominatif
        $patient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patient->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $patient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $patient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($patient->execute()) {
            $result = $patient->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
}

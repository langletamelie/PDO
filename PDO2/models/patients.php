<?php

/**
 * Création de la classe patients
 */
class patients {

//    liste des attributs
    private $connexion;
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

    /**
     * Méthode construct
     */
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
/**
 * méthode pour ajouter des patients
 * @return type
 */
    public function addPatient() {
        $insertInPatientsTable = $this->connexion->prepare('INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
        $insertInPatientsTable->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertInPatientsTable->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertInPatientsTable->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $insertInPatientsTable->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $insertInPatientsTable->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $insertInPatientsTable->execute();
    } 
  
/**
 * méthode pour afficher la liste des patients
 * @return type
 */
    public function getPatientsList() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`patients`.`birthdate`, "%d/%m/%Y") AS `birthdate`, `mail`, `phone`'
                . 'FROM `patients` ORDER BY `lastname`');
             
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        } return $result;
    }
/**
 * méthode vérifiant si un patient existe déjà et si c'est le cas, ne pas le créer à nouveau sinon le faire
 * @return type    
 */
    public function checkIfPatientExist() {
        $result = array();
        $patient = $this->connexion->prepare('SELECT COUNT(`id`) AS `count` FROM `patients` WHERE `lastname` = :lastname AND `firstname` = :firstname AND `birthdate` = :birthdate AND `phone` = :phone AND `mail` = :mail');
        // :bidule = marqueur nominatif
        $patient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $patient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $patient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
     
        if ($patient->execute()) {
            $result = $patient->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
/**
 *  méthode pour afficher le profil d'un patient sélectionné depuis la page listPatient
 * @return type
 */
    public function displayProfilPatient(){
        $result = array();
        $patientProfil = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id');
        $patientProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
       if ($patientProfil->execute()) {
            $result = $patientProfil->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
    /**
 *  méthode pour modifier le profil d'un patient sélectionné depuis la page listPatient
 * @return type
 */
    public function changeProfilPatient(){
      
        $patientProfil = $this->connexion->prepare('UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id');
        $patientProfil->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patientProfil->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patientProfil->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $patientProfil->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $patientProfil->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $patientProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
       
           return $patientProfil->execute();
      
        
    }
    
    
    /**
     * Méthode destruct (méthode magique)
     */
    public function __destruct() {
       $this->connexion = NULL;
    }

}

?>
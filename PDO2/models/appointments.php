<?php

/**
 * création de la table appointments
 */
class appointments {

    // liste des attributs

    private $connexion;
    public $id;
    public $dateHour;
    public $idPatients;

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
     * méthode pour ajouter des rendez-vous
     */
public function addRdv() {
    $insertInAppointmentsTable = $this->connexion->prepare('INSERT INTO `appointments`(`dateHour`, `dateHour`, `idPatients`) VALUES (:dateAppointment, :timeAppointment, :idPatients)');
    $insertInAppointmentsTable->bindValue(':dateAppointment', $this->date, PDO::PARAM_STR);
    $insertInAppointmentsTable->bindValue(':timeAppointment', $this->time, PDO::PARAM_INT);
    $insertInAppointmentsTable->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
    return $insertInAppointmentsTable->execute();
}
    
    
    
     /**
     * Méthode destruct (méthode magique)
     */
    public function __destruct() {
       $this->connexion = NULL;
    }
    
}

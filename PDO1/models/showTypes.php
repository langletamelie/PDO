<?php
/**
 * Création de la classe showTypes
 */
class showTypes{
    //Liste des attributs
    private $connexion;
    public $id;
    public $type;
    /**
     * Méthode construct
     */
    public function __construct(){
        //On test les erreurs avec le try/catch 
        //Si tout est bon, on est connecté à la base de donnée
        try{
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'abcd', '456');
        }
        //Autrement, un message d'erreur est affiché
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    /**
     * Méthode getShowList pour récupérer le résultat de la requête
     * @return type
     */
    public function getShowList(){
        $isObjectResult = array();
        $PDOResult = $this->connexion->query('SELECT `type`, `id` FROM `showTypes`');
        if(is_object($PDOResult)){
             $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }
    /**
     * Méthode destruct
     */
    public function __destruct(){
        ;
    }
}
?>
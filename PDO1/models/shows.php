<?php
/**
 * Création de la classe shows
 */
class shows{
    //Liste des attributs
    private $connexion;
    public $id;
    public $title;
    public $performer;
    public $date;
    public $showTypesId;
    public $firstGenresId;
    public $secondGenreId;
    public $duration;
    public $startTime;

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
     * Méthode getShowDetail pour récupérer le résultat de la requête
     * @return type
     */
    public function getShowDetail(){
        $PDOResult = $this->connexion->query('SELECT `title`,`performer`, DATE_FORMAT(`date`, \'%d/%m/%Y\') AS `date`, TIME_FORMAT(`startTime`, \'%Hh%i\') AS `startTime`'
                . 'FROM `shows` '
                . 'ORDER BY `title` ASC');
        return $PDOResult->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Méthode destruct
     */
    public function __destruct(){
        ;
    }
}
?>
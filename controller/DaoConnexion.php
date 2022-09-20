<?php
//definition de la classe pour se connecter a la base de donnee
class DaoConnexion{
    //definition du serveur
    private static $server = "mysql:host=localhost";
    //definition de la base de donnee
    private static $db = "dbname=gsbfrais";
    //definition de l'utilisateur
    private static $user = "greta2022";  //POUR WINDOWS root
    //definition du mot de passe
    private static $pwd = "AzEr1*";   //pour windows est vide
    //definition de la connexion a la base de donnee
    protected static $link;
    //dans le constructeur on initialise la connexion a la base de 
    //donnee en utilisant l'objet PDO . L'objet PDO est plus ecurise que 
    //mysqli car il permet d'eviter les injections sql
    //comme les proprietes que l'on a defini sont statiques pour y acceder 
    //on ecrit DaoConnexion:: si elle n'avait pas ete statique on aurait
    //remplace DaoConnexion:: par $this->
    //protected signifie que les classes qui pourront
    //acceder a ces proprietes sont les classes enfants c'est a dire celles
    //qui herite de la classe DaoCOnnexion.
    public function __construct(){
        DaoConnexion::$link = new PDO(DaoConnexion::$server . ";" . DaoConnexion::$db, DaoConnexion::$user, DaoConnexion::$pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
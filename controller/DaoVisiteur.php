<?php
//la classe DaoVisiteur etend la classe DaoConnexion (heritage) donc DaoVisiteur est une classe enfant donc on peut faire utiliser les proprietes defines protected ans la classe parent
class DaoVisiteur extends DaoConnexion {

    public function insertVisiteur(Visiteur $visiteur) {
        //1) On recupére les informations de l'objet visiteur
        $id=$visiteur->getid();
        $nom=$visiteur->getNom();
        $prenom=$visiteur->getPrenom();
        $login=$visiteur->getLogin();
        //On va insérer un visiteur avec un mot de passe crypté
        $mdp=password_hash($visiteur->getMdp(), PASSWORD_DEFAULT);
        $adresse=$visiteur->getAdresse();
        $cp=$visiteur->getCp();
        $ville=$visiteur->getVille();
        $dateEmbauche=$visiteur->getDateEmbauche();
        
        //2) On va creez la requete php / mysql
        //Les valeurs avec : représentent des paramétres qui vont etre remplace par ($id,$nom,...) apres qu'on les aient traité
        try {            
            $req="insert into Visiteur (id,nom,prenom,login,mdp,adresse,cp,ville,dateEmbauche) values (:id,:nom,:prenom,:login,:mdp,:adresse,:cp,:ville,:dateEmbauche)";
        
            //3) On va remplacer les parametres par des valeurs
            //On prepare la requete, c'est a dire qu'on va utiliser une "requete prepare".stmt est une abreviation pour statement (instruction)
    
            $stmt=parent::$link->prepare($req);
            //On va associer a tous les parametres de la requete
            //prepare les valeurs a inserer
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':nom',$nom);
            $stmt->bindParam(':prenom',$prenom);
            $stmt->bindParam(':login',$login);
            $stmt->bindParam(':mdp',$mdp);
            $stmt->bindParam(':adresse',$adresse);
            $stmt->bindParam(':cp',$cp);
            $stmt->bindParam(':ville',$ville);
            $stmt->bindParam(':dateEmbauche',$dateEmbauche);
            //4) On va executer la requete
            $stmt->execute(); 
            echo "<script> alert('Inscription réussi. Procédez à se connecter!') </script>";
        } catch (Exception $e) {
            echo "Le visiteur n'a pas été inséré!";
        }
    }

    public function checkLogin(string $login, string $mdp) {
        $request = "SELECT COUNT(*) AS nb FROM visiteur WHERE login=:login AND mdp=:mdp";
        try {
            $stmt = parent::$link->prepare($request);
            $stmt->bindParam(":login", $login);
            $stmt->bindParam(":mdp", $mdp);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
        $line = $stmt->fetch();
        return $line["nb"];
    }

    // public function getInfosVisiteur(string $login, string $mdp) {
    //     $request = "SELECT * FROM visiteur WHERE login=:login AND mdp=:mdp";
    //     try {
    //         $stmt = parent::$link->prepare($request);
    //         $stmt->bindParam(":login", $login);
    //         $stmt->bindParam(":mdp", $mdp);
    //         $stmt->execute();
    //     } catch (Exception $e) {
    //         echo "Erreur ! " . $e->getMessage();
    //     }
    //     $line = $stmt->fetch();
    //     $visiteur = null;
    //     if ($line != null) {
    //         $visiteur = new Visiteur($line["id"], $line["nom"], $line["prenom"], $line["login"], $line["mdp"], $line["adresse"], $line["cp"], $line["ville"], $line["dateEmbauche"]);
    //     }
    //     return $visiteur;
    // }
    public function getAllVisiteurs() {
        $request = "SELECT * FROM visiteur";
        try {
            $stmt = parent::$link->prepare($request);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
        // On va recuperer le premiere visiteur
        $line = $stmt->fetch();
        // On initialise la variable $visiteur a null
        $visiteur = null;
        // On initialise un tableau pour recuperer les visiteurs
        $listev=array();
        // Tant qu'il y a des lignes visiteurs 
        while ($line != null) {
            // Pour chaque ligne je creer visiteur 
            $visiteur = new Visiteur($line["id"], $line["nom"], $line["prenom"], $line["login"], $line["mdp"], $line["adresse"], $line["cp"], $line["ville"], $line["dateEmbauche"]);
            // J'ajoute le visiteur a l'array
            $listev[]=$visiteur;
            // Je passe au suivant
            $line = $stmt->fetch();
        }
        // Je envoie la liste des visiteurs
        return $listev;
    }


    //On definie la fonction getInfosVisiteur a laquelle 

    function getInfosVisiteur(string $login1, string $mdp1) {
        $request = "SELECT * FROM  visiteur";
        //On tente de executer les instructions compris dans le bloc try si il y a une erreur c'est le catch qui va executer le traitement
        try {
            //Parent: represente la classe DaoConnexion qui est definie apres le mot cle extends (heritage)
            //$link est defini protected cela signifie qu'on peut l'utiliser dans les classes enfants. De plus $link est static donc on fait appel a cette variable avec ::
            //parent::$link: represente la connexion a la base de donnee, ici on utilise la methode prepare de php  pour preparer la requete avant de l'executer, au cas ou il y a des parametres
            $stmt = parent::$link->prepare($request);
            //Elle execute la requete preparée
            $stmt->execute();
            //catch est un bloc qui eest executé si le bloc try a une erreur 
            //catch recupere un objet $e de type Exception
        } catch (Exception $e) {
            //elle afficher le message d'erreur
            echo "Erreur ! " . $e->getMessage();
        }
        //Dans $stmt on a la liste des visiteurs, donc on commence par lire le premier visiteur (stmt->fetch()) et on le stocke dans un tableau associatif qui est $line
        $line = $stmt->fetch();
        //On initialise une variable $user a null
        $user=null;
        //On teste que $line contient bien un visiteur
        while($line != null) {
            //On recupere le login et le password du visiteur stocke dans $line
            $login=$line['login'];
            $password= $line['mdp'];
            //Je teste si le mot de passe saisi est egal au mot de passe crypte alors $is_match est egal a true sinon a false
            $is_match = password_verify($mdp1, $password);
            //si le mot de passe saisi et le login saisi sont egale au mot de passe cryptee dans la base de donnee et au login dans la base de donnee alors on reupere le user
            if (($is_match) && $login1==$login) {
                //On instancie la classe Visiteur avec les donnees du visiteur qui correspond au login et au password saisi que l'on stocke dans $user
                $user = new Visiteur($line["id"], $line["nom"], $line["prenom"], $line["login"], $mdp1, $line["adresse"], $line["cp"], $line["ville"], $line["dateEmbauche"]);
            }
            //On lit le visiteur suivant que l'on stocke dans la variable $ligne
            $line = $stmt->fetch();
            //On retourne à l'instruction while($line != null)
        }
        
        if ($user == null) {
            echo "<script> alert('Incorrect username or password') </script>";
        } else {
            return $user;
        }
    }

    //on 
    public function deleteVisiteur($id){
          
        $request = "DELETE from visiteur WHERE id=:id";

        try {
           //on prepare la requete
           $stmt = parent::$link->prepare($request);
           //on remplace les paramatres par le valeur de $id
           $stmt->bindParam(":id", $id);

           //on execute la requete
           $stmt->execute();
           echo "On a supprimé le visiteur.";
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
    }
}

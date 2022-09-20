<?php
//ON desactive la protection chrome contre les attaques en cross scripting
// header ('X-XSS-Protection: 0');

function afficherTableau($dao) {
    //On appelle la liste des visiteurs
    $listev=$dao->getAllVisiteurs();
    //var_dump($listev);
    
    //On va afficher la liste des visiteurs dans un tableu html
    echo "<table border=1>";
    echo "<tr><td>nom</td><td>prénom</td><td>adresse</td><td>Supression</td><td>Modification</td></tr>";
    foreach($listev as $visiteur) {
        $id = $visiteur->getId();
        echo "<tr>";
        echo "<td>".$visiteur->getNom()."</td>";
        echo "<td>".$visiteur->getPrenom()."</td>";
        echo "<td>".$visiteur->getAdresse()."</td>";
        echo "<td><a href='form.php?id=$id&action=suppression'>Supprimer</a></td>";
        echo "<td><a href='form.php?id=$id&action=modification'>Modifier</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

require "../model/Visiteur.php";
require "../controller/DaoConnexion.php";
require "../controller/DaoVisiteur.php";

//On souhaite recuperer l'id a modifier ou a supprimer ainsi que l'action

if (isset($_GET["action"])) {
    $action = $_GET["action"];
    $id = $_GET["id"];

    //On va traiter la suppression
    if ($action=='suppression') {
        
        $dao=new DaoVisiteur();
        $dao->deleteVisiteur($id);

        afficherTableau($dao);

    }   else {
        echo "on modifie";
    }

}

//On va tester si on a clique sur le bouton submit et on va recuperer les donnees

if (isset($_POST["submit"])) {
    $id=htmlentities($_POST["id"]);
    $nom=htmlentities($_POST["nom"]);
    $prenom=htmlentities($_POST["prenom"]);
    $login=htmlentities($_POST["login"]);
    $mdp=htmlentities($_POST["mdp"]);
    $adresse=htmlentities($_POST["adresse"]);
    $cp=htmlentities($_POST["cp"]);
    $ville=htmlentities($_POST["ville"]);
    $dateEmbauche=htmlentities($_POST["dateEmbauche"]);

    //On va instacier un objet visiteur avec ces donnees

    $visiteur = new Visiteur($id,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$dateEmbauche);

    // var_dump($visiteur);
    // echo $visiteur->getId();

    $dao=new DaoVisiteur();
    $dao->insertVisiteur($visiteur);
    
    afficherTableau($dao);

}

?>
<!-- les donnees sont envoyees en POST pas visible dans l'URL vers ce meme fichier-->
<form action="" method="POST">
    Id<input type="text" name="id" required/></br>
    Nom<input type="text" name="nom" required/></br>
    Prénom<input type="text" name="prenom" required/></br>
    Login<input type="text" name="login" required/></br>
    Mdp<input type="text" name="mdp" required/></br>
    Adresse<input type="text" name="adresse" required/></br>
    Code Postal<input type="text" name="cp" required/></br>
    Ville<input type="text" name="ville" required/></br>
    Date Embauche<input type="date" name="dateEmbauche" required/></br>
    <input type="submit" name="submit" value="submit"/></br>
</form>

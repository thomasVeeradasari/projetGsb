<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, visiteur-scalable=0, shrink-to-fit=no">
    <meta name="description" content="C'est un issu de la fusion entre le géant américain Galaxy et le conglomérat européen Swiss Bourdin en 2009 dans l'industrie pharmaceutique.">
    <link rel="Icon" href="assets/img/logo.png" type="image/x-icon">
    <title>GSB - Galaxy Swiss Bourdin</title>

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;1,400&display=swap">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="wrapper">
        <?php
            /*************************************************************************************
            on demarre une session, cela va permettre de definir des variables
            de session pour stocker des valeurs qui vont pouvoir etre
            recupere pendant toute la duree de la session*/
            session_start();

            //*************************************************************************************
            //************************************************************************************
            //1 On inclut toutes les classes controlleur et les classes du modele
            //require_once signifie que la classe sera inséré une seul fois
            require_once "model/etat.php";
            require_once "model/ficheFrais.php";
            require_once "model/visiteur.php";
            require_once "model/fraisForfait.php";
            require_once "model/ligneFraisHorsForfait.php";
            require_once "model/ligneFraisForfait.php";
            require_once "controller/DaoConnexion.php";
            require_once "controller/DaoVisiteur.php";
            require_once "controller/DaoLigneFraisForfait.php";
            require_once "controller/DaoLigneFraisHorsForfait.php";
            require_once "controller/DaoFicheFrais.php";

            //************************************************************************************
            //***********************************************************************************
            //Les valeurs du formulaire de saisie du comptable sont a vides
            $idmois="";

            $repas="";
            $nuits="";
            $etapes="";
            $km="";
            $sitf="";

            $date="";
            $libelle="";
            $montantHorsForfait="";
            $sithf="";

            $justificatifs="";
            $montantHorsClassification="";
            $sithc="";

            //***********************************************************************************
            //**********************************************************************************
            //on instancie les classes DAO
            $daoLigneFraisForfait=new DaoLigneFraisForfait();
            $daoLigneFraisHorsForfait=new DaoLigneFraisHorsForfait();
            $daoFicheFrais=new DaoFicheFrais();
            $daoVisiteur=new DaoVisiteur();

            //On va tester la valeur de action, pour savoir si on a soumis un formulaire
            //isset: Teste si une variable existe
            // $_POST['action']: $_POST est une superglobale, c'est variable PHP qui contient les valeurs de toute les donnees soumise via le formaulaire
            if ((isset($_GET["action"])) || (isset($_POST["action"]))) {

                if (isset($_GET["action"])) $action=$_GET["action"];
                if (isset($_POST["action"])) $action=$_POST["action"];
                // echo "valeur de action ".$action;
            } else {
                //On a soumis aucun formulaire
                $action = "";
            }
            //Si action est egal a null (on a soumise aucun formulaire) on affiche la page de login
            if ($action=="") {
                include "view/connexion.php";
            }
            //On a choisit à s'inscrire apartir de menu de navigation
            if ($action=="inscription") {
                include "view/inscription.php";
            }

            //ici c'est le cas ou on soumet notre formulaire de login apres avoir saisi le login et le mot de passe
            if ($action=="login") {

                $login=$_POST["login"];
                $password=$_POST["mdp"];
                
                // On recherche si le visiteur existe
                $visiteur=$daoVisiteur->getInfosVisiteur($login, $password);

                $user=$visiteur;

                $_SESSION["visiteur"]=serialize($user);          

                //On suppose que le comptable
                if ($login=="dandre" && $password=="oppg5") {
                    //On recupere la liste des visiteurs
                    $listev=$daoVisiteur->getAllVisiteurs();
                    include "view/formValidFrais.php";
                } else {
                    if ($user!=null) {
                        include "view/formSaisieFrais.php";
                    } else {
                        include "view/connexion.php";
                    }   
                }
                
            }
        
            //*****************************************************************************
        
            if ($action=='validFrais') {
                echo "traitement du formulaire du comptable";
                //On va enregistrer les donnees du formulaire comptable dans la base de donnee et on reaffiche le formulaire 
                include "view/formValidFrais.php";
            }

            if ($action=='insertFrais') {
                echo "traitement du formulaire du visiteur";
                //On va enregistrer les donnees du formulaire comptable dans la base de donnee et on reaffiche le formulaire 
                include "view/formSaisieFrais.php";
            }

        ?>
    </div>
    <script src="assets/js/index.js"></script>
</body>
</html>



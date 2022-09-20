<?php

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

    //On va instancier un objet visiteur avec ces donnees

    $visiteur = new Visiteur($id,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$dateEmbauche);


    $dao=new DaoVisiteur();
    
    $dao->insertVisiteur($visiteur);
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;1,400&display=swap">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
</head>
<body>
    <nav>
        <a href="#"><img src="assets/img/logo.png" alt="logo"></a>
        <ul class="navMenu">
            <li><a href="index.php"><i class="lni lni-power-switch"></i><span class="navItemName loginText">Se Connecter</span></a></li>
        </ul>
    </nav>
    <div class="flex-inscription">
        <div class="container-inscription">
            <form action="" method="POST" class="signup" onsubmit="return validate()">
                <h1>Formulaire d'Inscription</h1>
                <div class="input">
                    <label for="id" class="id">ID</label>
                    <input onfocus ="showHintId()" onblur = "hideHintId()" type="text" name="id" id="id" required>
                    <span id="erId" class="erId"></span>
                </div>
                <div class="input">
                    <label for="nom" class="nom">Nom</label>
                    <input onfocus ="showHintNom()" onblur = "hideHintNom()" type="text" name="nom" id="nom" required>
                    <span id="erNom" class="erNom"></span>
                </div>
                <div class="input">
                    <label for="prenom" class="prenom">Prenom</label>
                    <input onfocus ="showHintPrenom()" onblur = "hideHintPrenom()" type="text" name="prenom" id="prenom" required>
                    <span id="erPrenom" class="erPrenom"></span>
                </div>
                <div class="input">
                    <label for="login" class="utilisateur">Identifiant</label>
                    <input onfocus ="showHintLogin()" onblur = "hideHintLogin()" type="text" name="login" id="login" required>
                    <span id="erLogin" class="erLogin"></span>
                </div>
                <div class="input">
                    <label for="mdp" class="motdepasse">Mot de passe</label>
                    <input onfocus ="showHintMdp()" onblur = "hideHintMdp()" type="password" name="mdp" id="mdp" required>
                    <span id="erMdp" class="erMdp"></span>
                </div>
                <div class="input">
                    <label for="adresse" class="adresse">Adresse</label>
                    <input onfocus ="showHintAdresse()" onblur = "hideHintAdresse()" type="text" name="adresse" id="adresse" required>
                    <span id="erAdresse" class="erAdresse"></span>
                </div>
                <div class="input">
                    <label for="cp" class="codepostal">Codepostal</label>
                    <input onfocus ="showHintCp()" onblur = "hideHintCp()" type="text" name="cp" id="cp" required>
                    <span id="erCp"class="erCp"></span>
                </div>
                <div class="input">
                    <label for="ville" class="ville">Ville</label>
                    <input onfocus ="showHintVille()" onblur = "hideHintVille()" type="text" name="ville" id="ville" required>
                    <span id="erVille" class="erVille"></span>
                </div>
                <div class="input">
                    <label for="dateEmbauche" class="dateEmbauche">Date d'embauche</label>
                    <input onfocus ="showHintDate()" onblur = "hideHintDate()" type="date" name="dateEmbauche" id="dateEmbauche" required>
                    <span id="erDate" class="erDate"></span>
                </div>
                <div class="input">
                    <div class="submit">
                        <input type="submit" name="submit" value="Enregistrer" onclick="validate()">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p class="topnav">&copy; GSB</p>
    </footer>
</body>
</html>
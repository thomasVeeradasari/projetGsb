<!DOCTYPE html>
<html lang="fr">

<body>
    <!-- Navbar -->
    <nav>
        <a href="#"><img src="./assets/img/logo.png" alt="logo"></a>
        <ul class="navMenu">
            <li><a href=""><i class="lni lni-home"></i><span class="navItemName loginText">ACCUEIL</span></a></li>
            <li><a href="index.php?action=inscription"><i class="lni lni-user"></i><span class="navItemName loginText">INSCRIPTION</span></a></li>
        </ul>
    </nav> <!-- End Navbar -->
    <!-- Login form -->
    <div class="wrapper-login">
        <div class="container-login">
            <div class="side-img-loginform">
                <img src="./assets/img/images.jpg" alt="image d'équipment laboratoire">
            </div>
            <form action="index.php" method="POST" class="login-form">
                <h2 class="form-title">IDENTIFIEZ-VOUS</h2>
                <div class="username-group">
                    <label for="login" class="username">IDENTIFIANT</label>
                    <input type="text" name="login" required>
                </div>
                <div class="password-group">
                    <label for="mdp" class="password">MOT DE PASSE</label>
                    <input type="password" name="mdp" required>
                </div>
                <input type="hidden" name="action" value="login"/>
                <span id="erConnexion" class="erConnexion"></span>            
                <!-- <a href=""><p class="forgot-pass">mot de passe oublié?</p></a> -->
                <input type="submit" value="Se Connecter" name='submit'>
                <!-- <p class="register">Créer un compte(<a href="inscription.php?id=$id&action=modification" class="registration">Cliquez ici</a>) </p> -->
            </form>
        </div>
    </div> <!-- End of login form -->
    <!-- footer -->
    <footer>
        <p class="topnav">&copy; GSB</p>
    </footer>        
</body>
</html>
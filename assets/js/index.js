
function validate() {

    var id = document.getElementById("id").value;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var login = document.getElementById("login").value;
    var mdp = document.getElementById("mdp").value;
    var adresse = document.getElementById("adresse").value;
    var cp = document.getElementById("cp").value;
    var ville = document.getElementById("ville").value;
    var dateEmbauche = document.getElementById("dateEmbauche").value;

    bool = true;

    if ( (mdp == "") || (!CheckPassword(mdp))) {

        showHintMdp();

        bool = false;
    
    } else {
        hideHintMdp();
    }
        
    return bool;

}

function CheckPassword(inputtxt) { 

    var regEx=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    return regEx.test(inputtxt);

}


function showHintId() {
    document.getElementById("erId").innerHTML = "Entrez votre numéro d'identification de votre carte d'identité d'entreprise";
    document.getElementById("erId").style.display = "inline-block";
}

function hideHintId() {
    document.getElementById("erId").style.display = "none";
}

function showHintNom() {
    document.getElementById("erNom").innerHTML = "Entrez votre nom tel qu'il figure sur votre carte d'identité d'entreprise";
    document.getElementById("erNom").style.display = "inline-block";
}

function hideHintNom() {
    document.getElementById("erNom").style.display = "none";
}

function showHintPrenom() {
    document.getElementById("erPrenom").innerHTML = "Entrez votre prenom tel qu'il figure sur votre carte d'identité d'entreprise";
    document.getElementById("erPrenom").style.display = "inline-block";
}

function hideHintPrenom() {
    document.getElementById("erPrenom").style.display = "none";
}

function showHintLogin() {
    document.getElementById("erLogin").innerHTML = "Entrez un nom d'utilisateur de votre choix. Il ne doit comporter que des lettres et des chiffres";
    document.getElementById("erLogin").style.display = "inline-block";
}

function hideHintLogin() {
    document.getElementById("erLogin").style.display = "none";
}

function showHintMdp() {
    document.getElementById("erMdp").innerHTML = "Entrez un mot de passe de votre choix. Il doit comporter entre 8 et 15 caractères, inclure au minimum une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial";
    document.getElementById("erMdp").style.display = "inline-block";
}

function hideHintMdp() {
    document.getElementById("erMdp").style.display = "none";
}

function showHintAdresse() {
    document.getElementById("erAdresse").innerHTML = "Entrez votre adresse de résidence";
    document.getElementById("erAdresse").style.display = "inline-block";
}

function hideHintAdresse() {
    document.getElementById("erAdresse").style.display = "none";
}

function showHintCp() {
    document.getElementById("erCp").innerHTML = "Entrez votre code postal";
    document.getElementById("erCp").style.display = "inline-block";
}

function hideHintCp() {
    document.getElementById("erCp").style.display = "none";
}

function showHintVille() {
    document.getElementById("erVille").innerHTML = "Entrez votre ville de résidence";
    document.getElementById("erVille").style.display = "inline-block";
}

function hideHintVille() {
    document.getElementById("erVille").style.display = "none";
}

function showHintDate() {
    document.getElementById("erDate").innerHTML = "Entrez votre date d'embauche mentionnée sur votre carte d'entreprise";
    document.getElementById("erDate").style.display = "inline-block";
}

function hideHintDate() {
    document.getElementById("erDate").style.display = "none";
}

function showErCon() {
    document.getElementById("erConnexion").innerHTML = "Incorrect username or password";
    document.getElementById("erConnexion").style.display = "inline-block";
}

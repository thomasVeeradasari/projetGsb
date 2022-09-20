<?php
//qui va realiser les operations CRUD sur la table ficheFRais
class DaoFicheFrais extends DaoConnexion
{
    
    //on insere une fiche de frais
    public function addFicheFrais(FicheFrais $ficheFrais)
    {
        //on recupere les proprietes de $ficheFrais grace aux getters
        $idVisiteur = $ficheFrais->getIdVisiteur();
        $mois = $ficheFrais->getMois();
        $nbJustificatifs = $ficheFrais->getNbJustificatifs();
        $montantValide = $ficheFrais->getMontantValide();
        $dateModif = $ficheFrais->getDateModif();
        $idEtat = $ficheFrais->getIdEtat();
        
        //On va creer la requete pour inserer une fiche de frais
        //on lui passe des parametres qui vont representer les valeurs
        //a inserer. il est inutile ici de preciser les champs car
        //on insere dans tous les champs de la table
        $request = "INSERT INTO ficheFrais VALUES (:idVisiteur, :mois, :nbJustificatifs, :montantValide, :dateModif, :idEtat)";
        //le bloc try cacth va gerer les erreurs, si le bloc try
        //ne s'execute pas correctment le bloc try va etre lance 
        //et on pourra traiter l'erreur
        try {
            //on prepare la requete
            $stmt = parent::$link->prepare($request);
            //on remplace les paramatres par les valeurs de $fichefrait
            $stmt->bindParam(":idVisiteur", $idVisiteur);
            $stmt->bindParam(":mois", $mois);
            $stmt->bindParam(":nbJustificatifs", $nbJustificatifs);
            $stmt->bindParam(":montantValide", $montantValide);
            $stmt->bindParam(":dateModif", $dateModif);
            $stmt->bindParam(":idEtat", $idEtat);
            //on execute la requete
            $stmt->execute();
            echo "La fiche des frais a été ajouté. ";
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
    }
    
    //on recupere la liste des frais pour un visiteur donnee
    public function listFicheFrais(string $idVisiteur){
        //on a la requete
        $request = "SELECT * FROM ficheFrais WHERE idVisiteur=:idVisiteur";
        //bloc try catch
        try{
            //on prepare la requete
            $stmt = parent::$link->prepare($request);
            //on remplace le parametre par la variable idVisiteur
            $stmt->bindParam(":idVisiteur", $idVisiteur);
            //on execute la requete
            $stmt->execute();
        } catch (Exception $e){
            echo "Erreur ! " . $e->getMessage();
        }
        //on recupere le resultat de la requete
        $line = $stmt->fetch();
        //on definit un array destine a recuperer les resultats
        $listFicheFrais = array();
        //on teste si il y a encore des resultats
        while($line != null){
            //on instancie un objet fichefrais avec les valeurs recuperes dans 
            //le tableau associatif dont les indices sont egal au champ
            //de la table fichefrais.ils doivent avoir la meme orthographe
            $ficheFrais = new FicheFrais($line["idVisiteur"], $line["mois"], $line["nbJustificatifs"], $line["montantValide"], $line["dateModif"], $line["idEtat"]);
            //on stocke la fichefrais recupere dans un array
            $listFicheFrais[] = $ficheFrais;
            //on recupere le resultat suivant
            $line = $stmt->fetch();
        }
        //on retourne le tableau de fiche de frais
        return $listFicheFrais;
    }
    //on recupere la liste des frais pour un visiteur donnee
    public function listFicheFraisByMonth(string $idVisiteur,String $mois){
        //on a la requete
        $request = "SELECT * FROM ficheFrais WHERE idVisiteur=:idVisiteur and mois=:mois";
        //bloc try catch
        try{
            //on prepare la requete
            $stmt = parent::$link->prepare($request);
            //on remplace le parametre par la variable idVisiteur
            $stmt->bindParam(":idVisiteur", $idVisiteur);
            $stmt->bindParam(":mois", $mois);
            //on execute la requete
            $stmt->execute();
        } catch (Exception $e){
            echo "Erreur ! " . $e->getMessage();
        }
        //on recupere le resultat de la requete
        $line = $stmt->fetch();
        //on definit un array destine a recuperer les resultats
        $listFicheFrais = array();
        //on teste si il y a encore des resultats
        while($line != null){
            //on instancie un objet fichefrais avec les valeurs recuperes dans 
            //le tableau associatif dont les indices sont egal au champ
            //de la table fichefrais.ils doivent avoir la meme orthographe
            $ficheFrais = new FicheFrais($line["idVisiteur"], $line["mois"], $line["nbJustificatifs"], $line["montantValide"], $line["dateModif"], $line["idEtat"]);
            //on stocke la fichefrais recupere dans un array
            $listFicheFrais[] = $ficheFrais;
            //on recupere le resultat suivant
            $line = $stmt->fetch();
        }
        //on retourne le tableau de fiche de frais
        return $listFicheFrais;
    }
     //on recupere la liste des frais pour un visiteur donnee
    public function updateFicheFrais(FicheFrais $ficheFrais){
         //on recupere les proprietes de $ficheFrais grace aux getters
        $idVisiteur = $ficheFrais->getIdVisiteur();
        $mois = $ficheFrais->getMois();
        $nbJustificatifs = $ficheFrais->getNbJustificatifs();
        $montantValide = $ficheFrais->getMontantValide();
        $dateModif = $ficheFrais->getDateModif();
        $idEtat = $ficheFrais->getIdEtat();
        
        //On va creer la requete pour inserer une fiche de frais
        //on lui passe des parametres qui vont representer les valeurs
        //a inserer. il est inutile ici de preciser les champs car
        //on insere dans tous les champs de la table
        
        $request = "UPDATE ficheFrais set  nbJustificatifs=:nbJustificatifs, montantValide=:montantValide, dateModif=:dateModif, idEtat=:idEtat WHERE idVisiteur=:idVisiteur and mois=:mois";
        //le bloc try cacth va gerer les erreurs, si le bloc try
        //ne s'execute pas correctment le bloc try va etre lance 
        //et on pourra traiter l'erreur
        try {
            //on prepare la requete
            $stmt = parent::$link->prepare($request);
            //on remplace les paramatres par les valeurs de $fichefrait
            $stmt->bindParam(":idVisiteur", $idVisiteur);
            $stmt->bindParam(":mois", $mois);
            $stmt->bindParam(":nbJustificatifs", $nbJustificatifs);
            $stmt->bindParam(":montantValide", $montantValide);
            $stmt->bindParam(":dateModif", $dateModif);
            $stmt->bindParam(":idEtat", $idEtat);
            //on execute la requete
            $stmt->execute();
            echo "La fiche des frais a été ajouté. ";
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
    }
}
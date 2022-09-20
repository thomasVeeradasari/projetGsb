<?php
//qui va realiser les operaitons CRUD sur la table LigneFraisForfait
class DaoLigneFraisForfait extends DaoConnexion {
	//on insere une ligne de frais forfait
	public function insertLigneFraisForfait(LigneFraisForfait $ligneFraisForfait) {
		//on recupere les propriétés de $ligneFraisForfait grace aux getters
		$idVisiteur = $ligneFraisForfait->getIdVisiteur();
		$mois = $ligneFraisForfait->getMois();
		$idFraisForfait = $ligneFraisForfait->getIdFraisForfait();
		$quantite = $ligneFraisForfait->getQuantite();
		//on va creer la requete pour inserer une ligne de frais forfait
		//on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile de presciser les champs car on insere dans tous les champs de la page
		$request = "INSERT INTO LigneFraisForfait VALUES (:idVisiteur, :mois, :idFraisForfait, :quantite)";
		// le bmloc try catch va gerer les erreurs, si le bloc try ne s'execute pas correctement le bloc try va etre lancé et on pourra traiteer l'erreur
		try {

			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace les parametres par les valeurs de $ligneFraisForfait
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			$stmt->bindParam(":idFraisForfait", $idFraisForfait);
			$stmt->bindParam(":quantite", $quantite);
			//on execute la requete
			$stmt->execute();
			echo "la ligne de frais forfait a été ajoutée. ";
		} catch (Exception $e) {
			file_put_contents("log.txt","Erreur ! " . $e->getMessage());
			echo "Erreur ! " . $e->getMessage();
		}
	}

	//on recupere la liste des frais forfait pour un visiteur donné
	public function listLigneFraisForfait(string $idVisiteur) {
		//on a la requete
		$request = "SELECT * FROM ligneFraisForfait WHERE idVisiteur=:idVisiteur";
		//bloc try/catch
		try {
			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace le parmametre par la variable idVisiteur
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			//on execeute la requete
			$stmt->execute();
		} catch (Exception $e) {
			echo "Erreur ! " . $e->getMessage();
		}
		//on recupere le resultat de la requete
		$line = $stmt->fetch();
		//on definit un array destiné à récuperer les resultats
		$listLigneFraisForfait = array();
		//on teste si il y a encore des resultats
		while($line != null) {
			//on instancie un objet ligneFraisForfait avec les valeurs récupérées dans le tableau associatif
			//dont les indices sont egaux au champ de la table ligneFraisForfait. Ils doivent avoir le meme ortographe
			$ligneFraisForfait = new LigneFraisForfait($line["idVisiteur"], $line["mois"], $line["idFraisForfait"], $line["quantite"]);
			//on stocke la ligne frais forfait récupérée dans un array
			$listLigneFraisForfait[] = $ligneFraisForfait;
			//on recupere le resultat suivant
			$line = $stmt->fetch();
		}
		//si plus de resultat on retourne le tableau de ligne de frais forfait
		return $listLigneFraisForfait;
	}
	//on recupere la liste des frais forfait pour un visiteur donné
	public function listLigneFraisForfaitByMonth(string $idVisiteur,string $mois) {
		//on a la requete
		$request = "SELECT * FROM LigneFraisForfait WHERE idVisiteur=:idVisiteur and mois=:mois";
		//bloc try/catch
		try {
			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace le parmametre par la variable idVisiteur
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			//on execeute la requete
			$stmt->execute();
		} catch (Exception $e) {
			echo "Erreur ! " . $e->getMessage();
		}
		//on recupere le resultat de la requete
		$line = $stmt->fetch();
		//on definit un array destiné à récuperer les resultats
		$listLigneFraisForfait = array();
		//on teste si il y a encore des resultats
		while($line != null) {
			//on instancie un objet ligneFraisForfait avec les valeurs récupérées dans le tableau associatif
			//dont les indices sont egaux au champ de la table ligneFraisForfait. Ils doivent avoir le meme ortographe
			$ligneFraisForfait = new LigneFraisForfait($line["idVisiteur"], $line["mois"], $line["idFraisForfait"], $line["quantite"]);
			//on stocke la ligne frais forfait récupérée dans un array
			$listLigneFraisForfait[] = $ligneFraisForfait;
			//on recupere le resultat suivant
			$line = $stmt->fetch();
		}
		//si plus de resultat on retourne le tableau de ligne de frais forfait
		return $listLigneFraisForfait;
	}
	public function updateLigneFraisForfait(LigneFraisForfait $ligneFraisForfait) {
		//on recupere les propriétés de $ligneFraisForfait grace aux getters
		$idVisiteur = $ligneFraisForfait->getIdVisiteur();
		$mois = $ligneFraisForfait->getMois();
		$idFraisForfait = $ligneFraisForfait->getIdFraisForfait();
		$quantite = $ligneFraisForfait->getQuantite();
		//on va creer la requete pour inserer une ligne de frais forfait
		//on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile de presciser les champs car on insere dans tous les champs de la page
		$request = "UPDATE LigneFraisForfait set quantite=:quantite WHERE idVisiteur=:idVisiteur and mois=:mois and idFraisForfait=:idFraisForfait";
		// le bmloc try catch va gerer les erreurs, si le bloc try ne s'execute pas correctement le bloc try va etre lancé et on pourra traiteer l'erreur
		try {

			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace les parametres par les valeurs de $ligneFraisForfait
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			$stmt->bindParam(":idFraisForfait", $idFraisForfait);
			$stmt->bindParam(":quantite", $quantite);
			//on execute la requete
			$stmt->execute();
			echo "la ligne de frais forfait a été ajoutée. ";
		} catch (Exception $e) {
			file_put_contents("log.txt","Erreur ! " . $e->getMessage());
			echo "Erreur ! " . $e->getMessage();
		}
	}
}
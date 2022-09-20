<?php
//qui va realiser les operaitons CRUD sur la table LigneFraisHorsForfait
class DaoLigneFraisHorsForfait extends DaoConnexion {
	//on insere une ligne de frais hors forfait
	public function addLigneFraisHorsForfait(LigneFraisHorsForfait $ligneFraisHorsForfait) {
		//on recupere les propriétés de $ligneFraisHorsForfait grace aux getters
		$id = $ligneFraisHorsForfait->getId();
		$idVisiteur = $ligneFraisHorsForfait->getIdVisiteur();
		$mois = $ligneFraisHorsForfait->getMois();
		$libelle = $ligneFraisHorsForfait->getLibelle();
		$date = $ligneFraisHorsForfait->getDate();
		$montant = $ligneFraisHorsForfait->getMontant();
		//on va creer la requete pour inserer une ligne de frais hors forfait
		//on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile de presciser les champs car on insere dans tous les champs de la page
		$request = "INSERT INTO LigneFraisHorsForfait (idVisiteur, mois, libelle, date, montant)
		VALUES (:idVisiteur, :mois, :libelle, :date, :montant)";
		// le bloc try catch va gerer les erreurs, si le bloc try ne s'execute pas correctement le bloc try va etre lancé et on pourra traiteer l'erreur
		try {
			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace les parametres par les valeurs de $ligneFraisForfait
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			$stmt->bindParam(":libelle", $libelle);
			$stmt->bindParam(":date", $date);
			$stmt->bindParam(":montant", $montant);
			//on execute la requete
			$stmt->execute();
			echo "la ligne de frais hors forfait a été ajoutée. ";
		} catch (Exception $e) {
			file_put_contents("log.txt","Erreur ! " . $e->getMessage());
			echo "Erreur ! " . $e->getMessage();
		}
	}

	//on recupere la liste des frais hors forfait pour un visiteur donné
	public function listLigneFraisHorsForfait(string $idVisiteur) {
		//on a la requete
		$request = "SELECT * FROM LigneFraisHorsForfait WHERE idVisiteur=:idVisiteur";
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
		$listLigneFraisHorsForfait = array();
		//on teste si il y a encore des resultats
		while($line != null) {
			//on instancie un objet ligneFraisHorsForfait avec les valeurs récupérées dans le tableau associatif
			//dont les indices sont egaux au champ de la table ligneFraisHorsForfait. Ils doivent avoir le meme ortographe
			$ligneFraisHorsForfait = new LigneFraisHorsForfait($line["idVisiteur"], $line["mois"], $line["libelle"], $line["date"], $line["montant"]);
			//on stocke la ligne frais hors forfait récupérée dans un array
			$listLigneFraisHorsForfait[] = $ligneFraisHorsForfait;
			//on recupere le resultat suivant
			$line = $stmt->fetch();
		}
		//si plus de resultat on retourne le tableau de ligne de frais hors forfait
		return $listLigneFraisHorsForfait;
	}
	//on recupere la liste des frais hors forfait pour un visiteur donné
	public function listLigneFraisHorsForfaitByMonth(string $idVisiteur,string $mois) {
		//on a la requete
		$request = "SELECT * FROM LigneFraisHorsForfait WHERE idVisiteur=:idVisiteur and mois=:mois";
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
		$listLigneFraisHorsForfait = array();
		//on teste si il y a encore des resultats
		while($line != null) {
			//on instancie un objet ligneFraisHorsForfait avec les valeurs récupérées dans le tableau associatif
			//dont les indices sont egaux au champ de la table ligneFraisHorsForfait. Ils doivent avoir le meme ortographe
			$ligneFraisHorsForfait = new LigneFraisHorsForfait($line["idVisiteur"], $line["mois"], $line["libelle"], $line["date"], $line["montant"]);
			//on stocke la ligne frais hors forfait récupérée dans un array
			$listLigneFraisHorsForfait[] = $ligneFraisHorsForfait;
			//on recupere le resultat suivant
			$line = $stmt->fetch();
		}
		//si plus de resultat on retourne le tableau de ligne de frais hors forfait
		return $listLigneFraisHorsForfait;
	}
	public function updateHorsForfait(LigneFraisHorsForfait $ligneFraisHorsForfait) {
		//on recupere les propriétés de $ligneFraisHorsForfait grace aux getters
		$id = $ligneFraisHorsForfait->getId();
		$idVisiteur = $ligneFraisHorsForfait->getIdVisiteur();
		$mois = $ligneFraisHorsForfait->getMois();
		$libelle = $ligneFraisHorsForfait->getLibelle();
		$date = $ligneFraisHorsForfait->getDate();
		$montant = $ligneFraisHorsForfait->getMontant();
		//on va creer la requete pour inserer une ligne de frais hors forfait
		//on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile de presciser les champs car on insere dans tous les champs de la page
		$request = "UPDATE  LigneFraisHorsForfait set libelle=:libelle, date=:date, montant=:montant WHERE idVisiteur=:idVisiteur and mois=:mois";
		// le bloc try catch va gerer les erreurs, si le bloc try ne s'execute pas correctement le bloc try va etre lancé et on pourra traiteer l'erreur
		try {
			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace les parametres par les valeurs de $ligneFraisForfait
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			$stmt->bindParam(":libelle", $libelle);
			$stmt->bindParam(":date", $date);
			$stmt->bindParam(":montant", $montant);
			//on execute la requete
			$stmt->execute();
			echo "la ligne de frais hors forfait a été ajoutée. ";
		} catch (Exception $e) {
			file_put_contents("log.txt","Erreur ! " . $e->getMessage());
			echo "Erreur ! " . $e->getMessage();
		}
	}
}
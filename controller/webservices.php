<?php
//On va creer un code php qui est capable de 
//recevoir des donnees JSON avec l'API http et
//qui est capable de determiner si la requete est
//envoye en POST, PUT,GET, DELETE (verbe HTTP).
//en premier: On recupere les donnees JSON envoye
//ainsi que le verbe.$_SERVER est une variable
//superglobale au meme titre que $_GET,$_POST,
//$_SESSION
include "model/Etat.php";
include "model/FicheFrais.php";
include "model/Visiteur.php";
include "model/FraisForfait.php";
include "model/LigneFraisHorsForfait.php";
include "model/LigneFraisForfait.php";
include "controller/DaoConnexion.php";
include "controller/DaoVisiteur.php";
include "controller/DaoLigneFraisForfait.php";
include "controller/DaoLigneFraisHorsForfait.php";
include "controller/DaoFicheFrais.php";
$input=file_get_contents("php://input");
$visiteur = $input;
$id = $visiteur->id;
$mois = $visiteur->mois;
$daoLigneFraisForfait=new DaoLigneFraisForfait();
$daoLigneFraisHorsForfait=new DaoLigneFraisHorsForfait();
$daoFicheFrais=new DaoFicheFrais();
$daoVisiteur=new DaoVisiteur();
$idselection=$_POST["visiteur"];
	$idmois=$_POST["mois"];
  $ligneFraisForfait=$daoLigneFraisForfait->listLigneFraisForfaitByMonth($idselection,$idmois);
//Les valeurs hors forfait a modifier sont recuperes
foreach ($ligneFraisForfait as $ligne) {
  if ($ligne->getIdFraisForfait()=="REP") $repas=$ligne->getQuantite();
  if ($ligne->getIdFraisForfait()=="NUI") $nuits=$ligne->getQuantite();
  if ($ligne->getIdFraisForfait()=="ETP") $etapes=$ligne->getQuantite();
  if ($ligne->getIdFraisForfait()=="KM")  $km=$ligne->getQuantite();
}
$ligneFraisHorsForfait=$daoLigneFraisHorsForfait->listLigneFraisHorsForfaitByMonth($idselection,$idmois);
$donnees[]=$ligneFraisHorsForfait;
$date=$ligneFraisHorsForfait[0]->getDate();
$libelle=$ligneFraisHorsForfait[0]->getLibelle();
$montantHorsClassification=$ligneFraisHorsForfait[0]->getMontant();

$ficheFraisForfait=$daoFicheFrais->listFicheFraisByMonth($idselection,$idmois);
$justificatifs=$ficheFraisForfait[0]->getNbJustificatifs();
$montantHorsForfait=$ficheFraisForfait[0]->getMontantValide();
$sithc=$ficheFraisForfait[0]->getIdEtat();
  $listev=$daoVisiteur->getAllVisiteurs();

$donnees["fff"]=$ligneFraisForfait;
$donnees["hff"]=$ligneFraisHorsForfait;
$donnees["fcf"]=$ficheFraisForfait;
//On va convertir l'array en json
$encode=json_encode($livres);
echo $encode;



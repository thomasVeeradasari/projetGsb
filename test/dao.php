<?php
require '../model/Visiteur.php';
require '../model/LigneFraisForfait.php';

require '../controller/DaoConnexion.php';
require '../controller/DaoLigneFraisForfait.php';
require '../controller/DaoVisiteur.php';

//J'instancie la classe DaoVisiteur car c'est elle qui possede la fonction d'insertion
// $dao = new DaoVisiteur();

// $visiteur = new Visiteur("x3","Marquez","Benjamin","itdcjs6","Dr00o","Ap #438-8410 Aliquam Rd.","61728","Lebowakgomo","2021-12-13");
// $dao->insertVisiteur($visiteur);
// $visiteur = new Visiteur("k8","Butler","Kathleen","ckhyhn1","Dz67e","1095 Vulputate, Av.","33479","Rostock","2022-04-16");
// $dao->insertVisiteur($visiteur);
// $visiteur = new Visiteur("s3","Slater","Aristotle","yfkgfo3","Mw80b","Ap #414-887 Neque St.","51245","Đà Nẵng","2022-10-23");
// $dao->insertVisiteur($visiteur);
// $visiteur = new Visiteur("c3","Vaughn","Tamekah","wtftsd8","Bz04l","Ap #735-3806 Sit Rd.","08518","Griesheim","2022-11-13");
// $dao->insertVisiteur($visiteur);
// $visiteur = new Visiteur("u7","Jensen","Eleanor","bqlnqi6","Oo00i","Ap #108-565 Ut St.","24764","Foz do Iguaçu","2023-03-28");
// $dao->insertVisiteur($visiteur);

// function getInfosVisiteur(string $login1, string $mdp1)
// $visiteur=$dao->getInfosVisiteur("itdcjs6","Dr00o");
// var_dump($visiteur);

$daoLigneFraisForfait = new DaoLigneFraisForfait();
//Pour effectuer le test de la methode insertLigneFraisForfait, on tente dabord d'inserer directement la ligne dans mysql.
//On s'aperçois que l'idVisiteur doit exister comme clé primaire dans la table visiteur
//Le couple (idVisiteur,mois) doit exister dans la table fichefrais comme clé primaire
// et l'idFraisForfait doit exister dans la table fraisforfait comme clé primaire
//par consequent il faut dabord inserer toutes les valeurs définit dans la classe fichefrais.php, dans la table fichefrais
//de plus on doit inserer les visiteurs avec le mois au prealable dans la table fichefrais.
$ligneFraisForfait = new LigneFraisForfait("c3","Jan","ETP",5);
$daoLigneFraisForfait->insertLigneFraisForfait($ligneFraisForfait);
var_dump($ligneFraisForfait);



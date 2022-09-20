<?php

class FicheFrais {

    private $idVisiteur;
    private $mois;
    private $nbJustificatifs;
    private $montantValide;
    private $dateModif;
    private $idEtat;

    public function __construct($idVisiteur, $mois, $nbJustificatifs, $montantValide, $dateModif, $idEtat) {

        $this->idVisiteur = $idVisiteur;
        $this->mois = $mois;
        $this->nbJustificatifs = $nbJustificatifs;
        $this->montantValide = $montantValide;
        $this->dateModif = $dateModif;
        $this->idEtat = $idEtat;

    }



    public function getIdVisiteur() {
        return $this->idVisiteur;
    }
    public function getMois() {
        return $this->mois;
    }
    public function getNbJustificatifs() {
        return $this->nbJustificatifs;
    }
    public function getMontantValide() {
        return $this->montantValide;
    }
    public function getDateModif() {
        return $this->dateModif;
    }
    public function getIdEtat() {
        return $this->idVisiteur;
    }


    public function setIdVisiteur($idVisiteur) {
        $this->idVisiteur = $idVisiteur;
    }
    public function setMois($mois) {
        $this->mois = $mois;
    }
    public function setNbJustificatifs($nbJustificatifs) {
        $this->nbJustificatifs = $nbJustificatifs;
    }
    public function setMontantValide($montantValide) {
        $this->montantValide = $montantValide;
    }
    public function setDateModif($dateModif) {
        $this->dateModif = $dateModif;
    }
    public function setIdEtat($idEtat) {
        $this->idEtat = $idEtat;
    }


   
}
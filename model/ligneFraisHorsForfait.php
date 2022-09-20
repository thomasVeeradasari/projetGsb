<?php

class LigneFraisHorsForfait {

    private $id;
    private $idVisiteur;
    private $mois;
    private $libelle;
    private $date;
    private $montant;

    public function __construct($idVisiteur, $mois, $libelle, $date, $montant) {

        $this->idVisiteur = $idVisiteur;
        $this->mois = $mois;
        $this->libelle = $libelle;
        $this->date = $date;
        $this->montant = $montant;

    }

    public function getId() {
        return $this->id;
    }
    public function getIdVisiteur() {
        return $this->idVisiteur;
    }
    public function getMois() {
        return $this->mois;
    }
    public function getLibelle() {
        return $this->libelle;
    }
    public function getDate() {
        return $this->date;
    }
    public function getMontant() {
        return $this->montant;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setIdVisiteur($idVisiteur) {
        $this->idVisiteur = $idVisiteur;
    }
    public function setMois($mois) {
        $this->mois = $mois;
    }
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setMontant($montant) {
        $this->montant = $montant;
    }


}
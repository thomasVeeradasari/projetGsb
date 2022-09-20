<?php

class LigneFraisForfait {

    private $idVisiteur;
    private $mois;
    private $idFraisForfait;
    private $quantite;


    public function __construct($idVisiteur, $mois, $idFraisForfait, $quantite) {

        $this->idVisiteur = $idVisiteur;
        $this->mois = $mois;
        $this->idFraisForfait = $idFraisForfait;
        $this->quantite = $quantite;

    }

    public function getIdVisiteur() {
       return $this->idVisiteur;
    }
    public function getMois() {
        return $this->mois;
    }
    public function getIdFraisForfait() {
        return $this->idFraisForfait;
    }
    public function getQuantite() {
        return $this->quantite;
    }


    public function setIdVisiteur($idVisiteur) {
        $this->idVisiteur = $idVisiteur;
    }
    public function setMois($mois) {
        $this->mois = $mois;
    }
    public function setIdFraisForfait($idFraisForfait) {
        $this->idFraisForfait = $idFraisForfait;
    }
    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }


}
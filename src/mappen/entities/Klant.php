<?php

namespace mappen\entities;

class Klant {

    private static $idMap = array();
    private $klantid;
    private $email;
    private $naam;
    private $voornaam;
    private $adres;
    private $postcode;
    private $telefoon;
    private $wachtwoord;
    private $promo;
    private $extra;

    private function __construct($klantid, $email, $naam, $voornaam, $adres, $postcode, $telefoon, $wachtwoord, $promo, $extra) {
        $this->klantid = $klantid;
        $this->email = $email;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->adres = $adres;
        $this->postcode = $postcode;
        $this->telefoon = $telefoon;
        $this->wachtwoord = $wachtwoord;
        $this->promo = $promo;
        $this->extra = $extra;
    }

    public static function create($klantid, $email, $naam, $voornaam, $adres, $postcode, $telefoon, $wachtwoord, $promo, $extra) {
        if (!isset(self::$idMap[$klantid])) {
            self::$idMap[$klantid] = new Klant($klantid, $email, $naam, $voornaam, $adres, $postcode, $telefoon, $wachtwoord, $promo, $extra);
        }
        return self::$idMap[$klantid];
    }

    public function getKlantid() {
        return $this->klantid;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    public function getAdres() {
        return $this->adres;
    }

    public function setAdres($adres) {
        $this->adres = $adres;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function getTelefoon() {
        return $this->telefoon;
    }

    public function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;
    }

    public function getWachtwoord() {
        return $this->wachtwoord;
    }

    public function setWachtwoord($wachtwoord) {
        $this->wachtwoord = $wachtwoord;
    }

    public function getPromo() {
        return $this->promo;
    }

    public function setPromo($promo) {
        $this->promo = $promo;
    }

    public function getExtra() {
        return $this->extra;
    }

    public function setExtra($extra) {
        $this->extra = $extra;
    }

}

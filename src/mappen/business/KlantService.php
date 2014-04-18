<?php

namespace mappen\business;

use mappen\data\KlantDAO;
use mappen\data\PostcodeDAO;

class KlantService {

    public static function insertKlant($email, $naam, $voornaam, $adres, $postcodeid, $telefoon, $wachtwoord, $promo, $extra) {
        $wachtwoordcod = md5($wachtwoord);
        KlantDAO::insertKlant($email, $naam, $voornaam, $adres, $postcodeid, $telefoon, $wachtwoordcod, $promo, $extra);
    }

    public static function controleerGebruiker($email, $wachtwoord) {
        $klant = KlantDAO::getByMail($email);
        $wachtwoordcod = md5($wachtwoord);
        if (isset($klant) && $klant->getWachtwoord() == $wachtwoordcod) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function getByMail($email) {
        $klant = KlantDAO::getByMail($email);
        return $klant;
    }
    
    public static function getByKlantid($klantid) {
        $klant = KlantDAO::getByMail($klantid);
        return $klant;
    }
    
    public static function updateKlant($klantid, $email, $naam, $voornaam, $adres, $postcodeid, $telefoon, $wachtwoord, $extra, $promo, $currentemail) {
        $wachtwoordcod = md5($wachtwoord);
        $postcode = PostcodeDAO::getByPostcodeid($postcodeid);
        $klant = KlantDAO::getByKlantid($klantid);
        $klant->setEmail($email);
        $klant->setNaam($naam);
        $klant->setVoornaam($voornaam);
        $klant->setAdres($adres);
        $klant->setPostcode($postcode);
        $klant->setTelefoon($telefoon);
        $klant->setWachtwoord($wachtwoordcod);
        $klant->setExtra($extra);
        $klant->setPromo($promo);
        KlantDAO::updateKlant($klant, $currentemail);
    }
    
    public static function verwijderKlant($klantid){
        KlantDAO::deleteKlant($klantid);
    }
    
}

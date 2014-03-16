<?php

//namespace mappen\data;

require_once ("src/mappen/entities/klant.class.php");
require_once ("src/mappen/entities/postcode.class.php");
require_once ("src/mappen/data/dbconfig.class.php");

class KlantDAO {

    public static function insertKlant($email, $naam, $voornaam, $adres, $postcodeid, $telefoon, $wachtwoord, $promo, $extra) {
        $bestaandEmail = self::getByMail($email);
        if (isset($bestaandEmail)) throw new EmailBestaatException();
        $sql = "insert into klanten (email, naam, voornaam, adres, postcodeid, telefoon, wachtwoord, promo, extra) "
                . "values ('" . $email . "', '" . $naam . "', '" . $voornaam . "', '" . $adres . "', " . $postcodeid . ", '" . $telefoon . "', '" . $wachtwoord . "', " . $promo . ", '" . $extra . "')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function updateKlant($klant, $sesionemail) {
        if ($sesionemail != $klant->getEmail()){
            $bestaandEmail = self::getByMail($klant->getEmail());
            if (isset($bestaandEmail)) throw new EmailBestaatException();}
        $sql = "update klanten set email='" . $klant->getEmail() . "', naam='" . $klant->getNaam() .
                "', voornaam='" . $klant->getVoornaam() . "', adres='" . $klant->getAdres() . "', postcodeid=" . $klant->getPostcode()->getPostcodeid() .
                 ", telefoon='" . $klant->getTelefoon() . "', wachtwoord='" . $klant->getWachtwoord() .  "'
                 , extra='" . $klant->getExtra() .  "', promo='" . $klant->getPromo() .
                "' where klantid = " . $klant->getKlantid();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function deleteKlant($klantid) {
        $sql = "delete from klanten where klantid =" .$klantid;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function getByMail($email) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select k.*, postcode, gemeente from klanten k, postcodes p where k.postcodeid = p.postcodeid and email = '" . $email . "'";
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $result = $resultSet->fetch();
            if ($result) {
                $postcode = Postcode::create($result["postcodeid"], $result["postcode"], $result["gemeente"]);
                $klant = Klant::create($result["klantid"], $result["email"], $result["naam"], $result["voornaam"], $result["adres"], $postcode, $result["telefoon"], $result["wachtwoord"], $result["promo"], $result["extra"]);
                $dbh = null;
                return $klant;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    public static function getByKlantid($klantid) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select k.*, postcode, gemeente from klanten k, postcodes p where k.postcodeid = p.postcodeid and klantid = '" . $klantid . "'";
        $resultSet = $dbh->query($sql);
            $result = $resultSet->fetch();
                $postcode = Postcode::create($result["postcodeid"], $result["postcode"], $result["gemeente"]);
                $klant = Klant::create($result["klantid"], $result["email"], $result["naam"], $result["voornaam"], $result["adres"], $postcode, $result["telefoon"], $result["wachtwoord"], $result["promo"], $result["extra"]);
                $dbh = null;
                return $klant;
    }
    

}

<?php

require_once ("src/mappen/data/dbconfig.class.php");

class BestellingDAO {
    
    
    public static function insertBestelling($klantid, $totaalprijs, $extra) {
        $sql = "insert into bestellingen (klantid, totaalprijs, extra)
        values (" . $klantid . ", " . $totaalprijs . ", '" . $extra . "')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $bestellingid = $dbh->lastInsertId();
        $dbh = null;
        return $bestellingid;
    }
    
    public static function insertBesteldetail($bestellingid, $productid) {
        $sql = "insert into besteldetail (bestellingid, productid)
        values (" . $bestellingid . ", " . $productid . ")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
}



<?php

namespace mappen\data;

use mappen\data\DBConfig;
use PDO;

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
    
    public static function insertBesteldetail($bestellingid, $productid, $aantal) {
        $sql = "insert into besteldetail (bestellingid, productid, aantal)
        values (" . $bestellingid . ", " . $productid . ", " . $aantal . ")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
}



<?php

//namespace mappen\data;

require_once ("src/mappen/entities/winkelkar.class.php");
require_once ("src/mappen/data/dbconfig.class.php");

class WinkelkarDAO {
    
    
    public static function getWinkelkarByKlantid($klantid) {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from winkelkar where klantid =" . $klantid . " order by productid";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result){
            $winkelkar = new WinkelKar($result["winkelkarid"], $result["klantid"], $result["productid"], $result["aantal"], $result["productnaam"], $result["prijs"]);
            array_push($lijst, $winkelkar);
            $dbh = null;}
            return $lijst;            
    }
    
   public static function addToWinkelkar($klantid, $productid, $aantal, $productnaam, $prijs) {        
        $sql = "insert into winkelkar (klantid, productid, aantal, productnaam, prijs) values (" . $klantid . ", " . $productid . ", " . $aantal . ", '" . $productnaam . "', " . $prijs . ")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function emptyWinkelkar($klantid) {        
        $sql = "delete from winkelkar where klantid =" .$klantid;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function verwijderUitWinkelkar($winkelkarid){
        $sql = "delete from winkelkar where winkelkarid =" .$winkelkarid;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    

}

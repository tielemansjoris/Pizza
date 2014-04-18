<?php

namespace mappen\data;

use mappen\data\ProductDAO;
use mappen\entities\WinkelKar;
use mappen\data\DBConfig;
use PDO;

class WinkelkarDAO {
    
    
    public static function getWinkelkarByKlantid($klantid) {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select productid, winkelkarid, count(*) as aantal from winkelkar where klantid = " . $klantid . " group by productid";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result){
            $product = ProductDAO::getByProductid($result["productid"]);
            $winkelkar = new WinkelKar($result["winkelkarid"], $klantid, $product->getProductid(), $product->getProductnaam(), ($product->getPrijs() * $result["aantal"]), ($product->getPromoprijs() * $result["aantal"]), $result["aantal"]);
            array_push($lijst, $winkelkar);
            $dbh = null;}
            return $lijst;            
    }
    
   public static function addToWinkelkar($klantid, $productid) {        
        $sql = "insert into winkelkar (klantid, productid) values (" . $klantid . ", " . $productid . ")";
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

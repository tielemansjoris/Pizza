<?php

namespace mappen\data;

use mappen\entities\Product;
use mappen\data\DBConfig;
use PDO;


class ProductDAO {

    public static function getAll() {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from producten";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result) {
            $product = Product::create($result["productid"], $result["productnaam"], $result["productomschrijving"], $result["prijs"], $result["promoprijs"], $result["afbeelding"]);
            array_push($lijst, $product);
        }
        $dbh = null;
        return $lijst;
    }
    
    public static function getByProductid($productid) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from producten where productid =" . $productid;
        $resultSet = $dbh->query($sql);
            $result = $resultSet->fetch();
                $product = Product::create($result["productid"], $result["productnaam"], $result["productomschrijving"], $result["prijs"], $result["promoprijs"], $result["afbeelding"]);
                $dbh = null;
                return $product;
    }

}

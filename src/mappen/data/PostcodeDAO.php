<?php

namespace mappen\data;

use mappen\entities\Postcode;
use mappen\data\DBConfig;
use PDO;

class PostcodeDAO {

    public static function getAll() {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from postcodes";
        $resultset = $dbh->query($sql);
        foreach ($resultset as $result) {
            $postcode = Postcode::create($result["postcodeid"], $result["postcode"], $result["gemeente"]);
            array_push($lijst, $postcode);
        }
        $dbh = null;
        return $lijst;
    }
    
    public static function getByPostcodeid($postcodeid) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from postcodes
where postcodeid = " . $postcodeid;
        $resultSet = $dbh->query($sql);
        $result = $resultSet->fetch();
        $postcode = Postcode::create($postcodeid, $result["postcode"], $result["gemeente"]);
        $dbh = null;
        return $postcode;
    }

}
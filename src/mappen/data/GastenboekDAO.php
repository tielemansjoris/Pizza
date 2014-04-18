<?php

namespace mappen\data;

use mappen\entities\Gastenboek;
use mappen\data\DBConfig;
use PDO;

class GastenboekDAO {

    public static function getAll() {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from gastenboek order by datum desc limit 4";
        $resultset = $dbh->query($sql);
        foreach ($resultset as $result) {
            $gastenboek = new Gastenboek($result["gastenboekid"], $result["email"], $result["bericht"], $result["datum"]);
            array_push($lijst, $gastenboek);
        }
        $dbh = null;
        return $lijst;
    }
    
    public static function insertKlant($email, $bericht) {
        $sql = "insert into gastenboek (email, bericht) values ('" . $email . "', '" . $bericht . "')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }

}
<?php

//namespace mappen\entities;

class Postcode {

    private static $idMap = array();
    private $postcodeid;
    private $postcode;
    private $gemeente;

    private function __construct($postcodeid, $postcode, $gemeente) {
        $this->postcodeid = $postcodeid;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
    }

    public static function create($postcodeid, $postcode, $gemeente) {
        if (!isset(self::$idMap[$postcodeid])) {
            self::$idMap[$postcodeid] = new Postcode($postcodeid, $postcode, $gemeente);
        }
        return self::$idMap[$postcodeid];
    }

    public function getPostcodeid() {
        return $this->postcodeid;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function getGemeente() {
        return $this->gemeente;
    }

    public function setGemeente($gemeente) {
        $this->gemeente = $gemeente;
    }

}

<?php

namespace mappen\business;

use mappen\data\GastenboekDAO;

class GastenboekService {
    
    public static function getAll(){
        $lijst = GastenboekDAO::getAll();
        return $lijst;
    }
    
    public static function addBericht($email, $bericht){
        GastenboekDAO::insertKlant($email, $bericht);
    }
}
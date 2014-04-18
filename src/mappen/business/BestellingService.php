<?php

namespace mappen\business;

use mappen\data\BestellingDAO;

class BestellingService {
    
    public static function insertBestelling($klantid, $winkelkar, $totaal, $extra) {
        $bestellingid = BestellingDAO::insertBestelling($klantid, $totaal, $extra);
        foreach ($winkelkar as $result){
            BestellingDAO::insertBesteldetail($bestellingid, $result->getProductid(), $result->getAantal());
        }
    }
    
}
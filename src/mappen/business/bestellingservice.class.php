<?php

require_once ("src/mappen/data/bestellingdao.class.php");

class BestellingService {
    
    public static function insertBestelling($klantid, $winkelkar, $totaal, $extra) {
        $bestellingid = BestellingDAO::insertBestelling($klantid, $totaal, $extra);
        foreach ($winkelkar as $result){
            BestellingDAO::insertBesteldetail($bestellingid, $result->getProductid());
        }
    }
    
}
<?php

require_once ("src/mappen/data/winkelkardao.class.php");

class WinkelkarService {
    
    public static function getWinkelkarByKlantid($klantid) {
        $lijst = WinkelkarDAO::getWinkelkarByKlantid($klantid);
        return $lijst;
    }
    
    public static function addToWinkelkar($klant, $product, $aantal) {
        $klantid = $klant->getKlantid();
        $productid = $product->getProductid();
        $productnaam = $product->getProductnaam();
        $promo = $klant->getPromo();
        if ($promo == 1){
            $prijs = $product->getPromoprijs();
        }
        else {
            $prijs = $product->getPrijs();
        }
        $promoprijs = $product->getPromoprijs();
        WinkelkarDAO::addToWinkelkar($klantid, $productid, $aantal, $productnaam, $prijs);
    }
    
    public static function emptyWinkelkar($klantid){
        WinkelkarDAO::emptyWinkelkar($klantid);        
    }
    
    public static function verwijderuitWinkelkar($winkelkarid){
        WinkelkarDAO::verwijderUitWinkelkar($winkelkarid);        
    }
}
<?php

namespace mappen\business;

use mappen\data\WinkelkarDAO;

class WinkelkarService {
    
    public static function getWinkelkarByKlantid($klantid) {
        $lijst = WinkelkarDAO::getWinkelkarByKlantid($klantid);
        return $lijst;
    }
    
    public static function addToWinkelkar($klantid, $productid) {
        WinkelkarDAO::addToWinkelkar($klantid, $productid);
    }
    
    public static function emptyWinkelkar($klantid){
        WinkelkarDAO::emptyWinkelkar($klantid);        
    }
    
    public static function verwijderuitWinkelkar($winkelkarid){
        WinkelkarDAO::verwijderUitWinkelkar($winkelkarid);        
    }
}
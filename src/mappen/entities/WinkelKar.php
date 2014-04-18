<?php

namespace mappen\entities;

class WinkelKar {

    private $winkelkarid;
    private $klantid;
    private $productid;
    private $productnaam;
    private $prijs;
    private $promoprijs;
    private $aantal;

    public function __construct($winkelkarid, $klantid, $productid, $productnaam, $prijs, $promoprijs, $aantal) {
        $this->winkelkarid = $winkelkarid;
        $this->klantid = $klantid;
        $this->productid = $productid;
        $this->productnaam = $productnaam;
        $this->prijs = $prijs;
        $this->promoprijs = $promoprijs;
        $this->aantal = $aantal;
        
    }

    public function getWinkelkarid() {
        return $this->winkelkarid;
    }

    public function getKlantid() {
        return $this->klantid;
    }

    public function setKlantid($klantid) {
        $this->klantid = $klantid;
    }

    public function getProductid() {
        return $this->productid;
    }

    public function setProductid($productid) {
        $this->productid = $productid;
    }
    
    public function getProductnaam() {
        return $this->productnaam;
    }

    public function setProductnaam($productnaam) {
        $this->productnaam = $productnaam;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setPrijs($prijs) {
        $this->prijs = $prijs;
    }
    
    public function getPromoprijs() {
        return $this->promoprijs;
    }

    public function setPromoprijs($promoprijs) {
        $this->promoprijs = $promoprijs;
    }
    
    public function getAantal() {
        return $this->aantal;
    }

    public function setAantal($aantal) {
        $this->aantal = $aantal;
    }
}

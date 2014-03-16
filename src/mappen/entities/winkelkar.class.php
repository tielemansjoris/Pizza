<?php

//namespace mappen\entities;

class WinkelKar {

    private $winkelkarid;
    private $klantid;
    private $productid;
    private $aantal;
    private $productnaam;
    private $prijs;

    public function __construct($winkelkarid, $klantid, $productid, $aantal, $productnaam, $prijs) {
        $this->winkelkarid = $winkelkarid;
        $this->klantid = $klantid;
        $this->productid = $productid;
        $this->aantal = $aantal;
        $this->productnaam = $productnaam;
        $this->prijs = $prijs;
        
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

    public function getAantal() {
        return $this->aantal;
    }

    public function setAantal($aantal) {
        $this->aantal = $aantal;
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
}

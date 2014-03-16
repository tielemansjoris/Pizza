<?php

//namespace mappen\entities;

class Product {

    private static $idMap = array();
    private $productid;
    private $productnaam;
    private $productomschrijving;
    private $prijs;
    private $promoprijs;
    private $afbeelding;

    private function __construct($productid, $productnaam, $productomschrijving, $prijs, $promoprijs, $afbeelding) {
        $this->productid = $productid;
        $this->productnaam = $productnaam;
        $this->productomschrijving = $productomschrijving;
        $this->prijs = $prijs;
        $this->promoprijs = $promoprijs;
        $this->afbeelding = $afbeelding;
    }

    public static function create($productid, $productnaam, $productomschrijving, $prijs, $promoprijs, $afbeelding) {
        if (!isset(self::$idMap[$productid])) {
            self::$idMap[$productid] = new Product($productid, $productnaam, $productomschrijving, $prijs, $promoprijs, $afbeelding);
        }
        return self::$idMap[$productid];
    }

    public function getProductid() {
        return $this->productid;
    }

    public function getProductnaam() {
        return $this->productnaam;
    }

    public function setProductnaam($productnaam) {
        $this->productnaam = $productnaam;
    }

    public function getProductomschrijving() {
        return $this->productomschrijving;
    }

    public function setProductomschrijving($productomschrijving) {
        $this->productomschrijving = $productomschrijving;
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

    public function getAfbeelding() {
        return $this->afbeelding;
    }

    public function setAfbeelding($afbeelding) {
        $this->afbeelding = $afbeelding;
    }


}

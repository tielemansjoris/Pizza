<?php

//namespace mappen\business;

require_once ("src/mappen/data/productdao.class.php");

class ProductService {
    
    public static function getAll() {
        $lijst = ProductDAO::getAll();
        return $lijst;
    }
    
    public static function getByProductid($productid) {
        $product = ProductDAO::getByProductid($productid);
        return $product;
    }
}

<?php

namespace mappen\business;

use mappen\data\ProductDAO;

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

<?php

namespace mappen\business;

use mappen\data\PostcodeDAO;

class PostcodeService {
    
    public static function getAll(){
        $lijst = PostcodeDAO::getAll();
        return $lijst;
    }
}
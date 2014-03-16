<?php

//namespace VDAB\Business;

require_once ("src/mappen/data/postcodedao.class.php");


class PostcodeService {
    
    public static function getAll(){
        $lijst = PostcodeDAO::getAll();
        return $lijst;
    }
}
<?php

session_start();

require_once ("src/mappen/business/klantservice.class.php");
require_once ("src/mappen/business/winkelkarservice.class.php");
require_once ("src/mappen/business/productservice.class.php");

$email = $_SESSION["email"];
$klant = KlantService::getByMail($email);

if (isset($_GET["action"])){
    if ($_GET["action"] == "voegtoe"){
        $product = ProductService::getByProductid($_GET["productid"]);
        $aantal = 1;
        WinkelkarService::addToWinkelkar($klant, $product, $aantal);
        header ("location: index.php");
        exit(0);
    }
    
    if ($_GET["action"] == "empty"){
        WinkelkarService::emptyWinkelkar($_GET["klantid"]);
        header ("location: index.php");
        exit(0);
    }
    
    if ($_GET["action"] == "verwijder"){
        WinkelkarService::verwijderuitWinkelkar($_GET["winkelkarid"]);
        header ("location: index.php");
        exit(0);
    }
}


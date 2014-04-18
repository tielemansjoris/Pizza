<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\KlantService;
use mappen\business\WinkelkarService;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();


$email = $_SESSION["email"];
$klant = KlantService::getByMail($email);

if (isset($_GET["action"])){
    if ($_GET["action"] == "voegtoe"){
        WinkelkarService::addToWinkelkar($klant->getKlantid(), $_GET["productid"]);
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


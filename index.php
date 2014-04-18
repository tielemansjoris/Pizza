<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\ProductService;
use mappen\business\KlantService;
use mappen\business\WinkelkarService;
use mappen\business\GastenboekService;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();

if (!isset($_SESSION["aangemeld"])) {
    
    header("location: indexlocked.php");
    exit(0);  
        
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "verzonden"){
        $verzonden = true;
    }
    if ($_GET["action"] == "geupdate"){
        $geupdate = true;
    }
}

$pizzalijst = ProductService::getAll();
$klant = KlantService::getByMail($_SESSION["email"]);
$winkelkar = WinkelkarService::getWinkelkarByKlantid($klant->getKlantid());
$gastenboek = GastenboekService::getAll();
$email = $_SESSION["email"];
$totaal = 0;

include("src/mappen/presentation/pizzalijst.php");



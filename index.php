<?php

session_start();

require_once ("src/mappen/business/productservice.class.php");
require_once ("src/mappen/business/klantservice.class.php");
require_once ("src/mappen/business/winkelkarservice.class.php");

if (!isset($_SESSION["aangemeld"])) {
    
    header("location: indexlocked.php");
    exit(0);  
        
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "verzonden"){
        $verzonden = true;
    }
}

$pizzalijst = ProductService::getAll();
$klant = KlantService::getByMail($_SESSION["email"]);
$winkelkar = WinkelkarService::getWinkelkarByKlantid($klant->getKlantid());
$totaal = 0;

include("src/mappen/presentation/pizzalijst.php");



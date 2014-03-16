<?php

session_start();

require_once ("src/mappen/business/postcodeservice.class.php");
require_once ("src/mappen/business/klantservice.class.php");
require_once ("src/mappen/business/winkelkarservice.class.php");
require_once ("src/mappen/exceptions/emailbestaatexception.class.php");

if (!isset($_SESSION["aangemeld"])) {
    header("location: indexlocked.php");
    exit(0);
}

$klant = KlantService::getByMail($_SESSION["email"]);

if (isset($_GET["action"])) {
    if ($_GET["action"] == "update"){
        try {
            if ($klant->getPromo() != $_POST["promo"]) {WinkelkarService::emptyWinkelkar($klant->getKlantid());}
            KlantService::updateKlant($_GET["klantid"], $_POST["email"], $_POST["naam"], $_POST["voornaam"], $_POST["adres"], $_POST["postcodeid"], $_POST["telefoon"], $_POST["wachtwoord"], $_POST["extra"], $_POST["promo"]);
            setcookie("email", $_POST["email"], time() + 2592000);
            $_SESSION["email"] = $_POST["email"];
            header("location: index.php");
            exit(0);}
        catch (EmailBestaatException $ebe){
            header("location: updateklant.php?error=emailexists");
            exit(0);
            }
        }
    
    
    if ($_GET["action"] == "verwijder") {
        KlantService::verwijderKlant($_GET["klantid"]);
        unset($_SESSION["aangemeld"]);
        WinkelkarService::emptyWinkelkar($_GET["klantid"]);
        header("location: index.php");
        exit(0);
    }
}

if (isset($_GET["error"])){
    $error = $_GET["error"];}
        
$postcodelijst = PostcodeService::getAll();

include("src/mappen/presentation/updateklantform.php");

<?php

session_start();

require_once ("src/mappen/business/klantservice.class.php");
require_once ("src/mappen/business/postcodeservice.class.php");
require_once ("src/mappen/entities/postcode.class.php");
require_once ("src/mappen/exceptions/emailbestaatexception.class.php");

if (isset($_GET["action"])) {
    if ($_GET["action"] == "voegtoe") {        
        try {
            KlantService::insertKlant($_POST["email"], $_POST["naam"], $_POST["voornaam"], $_POST["adres"], $_POST["postcodeid"], $_POST["telefoon"], $_POST["wachtwoord"], $_POST["promo"], $_POST["extra"]);
            setcookie("email", $_POST["email"], time() + 2592000);
            header("location: indexlocked.php");
            exit(0);
            
        } 
        catch (EmailBestaatException $ebe){
            header("location: nieuweklant.php?error=emailexists");
            exit(0);
        }
    }
} else {
    $postcodelijst = PostcodeService::getAll();
    
    if (isset($_GET["error"])){
        $error = $_GET["error"];}
        
    include_once ("src/mappen/presentation/nieuweklantform.php");
}
<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\KlantService;
use mappen\business\PostcodeService;
use mappen\exceptions\EmailBestaatException;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();

if (isset($_GET["action"])) {
    if ($_GET["action"] == "voegtoe") {
        try {
            if ($_POST["wachtwoord"] == $_POST["wachtwoordopnieuw"]) {
                KlantService::insertKlant($_POST["email"], $_POST["naam"], $_POST["voornaam"], $_POST["adres"], $_POST["postcodeid"], $_POST["telefoon"], $_POST["wachtwoord"], $_POST["promo"], $_POST["extra"]);
                setcookie("email", $_POST["email"], time() + 2592000);
                header("location: indexlocked.php?action=toegevoegd");
                exit(0);
            } else {
                header("location: nieuweklant.php?error=wachtwoordnietgelijk");
                exit(0);
            }
        } catch (EmailBestaatException $ebe) {
            header("location: nieuweklant.php?error=emailexists");
            exit(0);
        }
    }
} else {
    $postcodelijst = PostcodeService::getAll();

    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }

    include_once ("src/mappen/presentation/nieuweklantform.php");
}
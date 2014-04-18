<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\PostcodeService;
use mappen\business\KlantService;
use mappen\business\WinkelkarService;
use mappen\exceptions\EmailBestaatException;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();


if (!isset($_SESSION["aangemeld"])) {
    header("location: indexlocked.php");
    exit(0);
}

$klant = KlantService::getByMail($_SESSION["email"]);

if (isset($_GET["action"])) {
    if ($_GET["action"] == "update") {
        try {
            if ($_POST["wachtwoord"] == $_POST["wachtwoordopnieuw"]) {
                KlantService::updateKlant($_GET["klantid"], $_POST["email"], $_POST["naam"], $_POST["voornaam"], $_POST["adres"], $_POST["postcodeid"], $_POST["telefoon"], $_POST["wachtwoord"], $_POST["extra"], $_POST["promo"], $_SESSION["email"]);
                setcookie("email", $_POST["email"], time() + 2592000);
                $_SESSION["email"] = $_POST["email"];
                header("location: index.php?action=geupdate");
                exit(0);
            } else {
                header("location: updateklant.php?error=wachtwoordnietgelijk");
                exit(0);
            }
        } catch (EmailBestaatException $ebe) {
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

if (isset($_GET["error"])) {
    $error = $_GET["error"];
}

$postcodelijst = PostcodeService::getAll();

include("src/mappen/presentation/updateklantform.php");

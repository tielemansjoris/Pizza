<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\KlantService;
use mappen\business\WinkelkarService;
use mappen\business\BestellingService;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();

$email = $_SESSION["email"];
$totaal = 0;
$klant = KlantService::getByMail($email);
$winkelkar = WinkelkarService::getWinkelkarByKlantid($klant->getKlantid());

if (empty($winkelkar)) {
    header("location: index.php");
    exit(0);
}
foreach ($winkelkar as $result) {
    if ($klant->getPromo() == 1) {
        $totaal += $result->getPromoprijs();
    } else {
        $totaal += $result->getPrijs();
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "verwijder") {
        WinkelkarService::verwijderuitWinkelkar($_GET["winkelkarid"]);
        header("location: checkout.php");
        exit(0);
    }
    if ($_GET["action"] == "checkout") {
        BestellingService::insertBestelling($klant->getKlantid(), $winkelkar, $totaal, $_POST["extra"]);
        WinkelkarService::emptyWinkelkar($klant->getKlantid());
        header("location: index.php?action=verzonden");
        exit(0);
    }
}

include("src/mappen/presentation/checkoutform.php");



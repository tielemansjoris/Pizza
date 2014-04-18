<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\GastenboekService;
use mappen\business\ProductService;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();


if (isset($_SESSION["aangemeld"])) {
    header("location: index.php");
    exit(0);
}
$email = "";

if (isset($_COOKIE["email"])){
    $email = $_COOKIE["email"];
}

if (isset($_SESSION["error"]) && $_SESSION["error"] == "verkeerdwachtwoord"){
    $error = $_SESSION["error"];
    unset ($_SESSION["error"]);
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "toegevoegd"){
        $toegevoegd = true;
    }
}

$gastenboek = GastenboekService::getAll();
$pizzalijst = ProductService::getAll();

include ("src/mappen/presentation/pizzalijstlocked.php");

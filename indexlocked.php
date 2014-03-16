<?php

session_start();

require_once ("src/mappen/business/productservice.class.php");

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

$pizzalijst = ProductService::getAll();

include ("src/mappen/presentation/pizzalijstlocked.php");

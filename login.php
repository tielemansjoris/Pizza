<?php

session_start();

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\KlantService;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();

if (isset($_GET["action"])){
    if ($_GET["action"] == "login") {
        
        $toegelaten = KlantService::controleerGebruiker($_POST["email"], $_POST["wachtwoord"]);        

        if ($toegelaten) {        
            $_SESSION["aangemeld"] = true;
            setcookie("email", $_POST["email"], time() + 2592000); 
            $_SESSION["email"] = $_POST["email"];
            header("location: index.php");
            exit(0);            
            }
        else {
            $_SESSION["error"] = "verkeerdwachtwoord";
            header("location: index.php");
            exit(0);
        }
        
    }

    if ($_GET["action"] == "logout"){
        unset($_SESSION["aangemeld"]);        
    }
}

header("location: index.php");
exit(0);

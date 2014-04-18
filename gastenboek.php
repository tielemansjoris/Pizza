<?php

require_once("Doctrine/Common/ClassLoader.php");

use mappen\business\GastenboekService;
use Doctrine\Common\ClassLoader;

$classLoader = new ClassLoader("mappen", "src");
$classLoader->register();

if (isset($_GET["action"])){
    if ($_GET["action"] == "addbericht"){
    GastenboekService::addBericht($_POST["email"], $_POST["bericht"]);
    header ("location: index.php");
    exit(0);
    }
}
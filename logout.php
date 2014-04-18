<?php

session_start();

if (isset($_GET["logout"])) {
    if ($_GET["logout"] == logout) {
        unset($_SESSION["aangemeld"]);
    }
}

header("location: index.php");

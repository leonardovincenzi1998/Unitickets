<?php
require_once("bootstrap.php");
require 'access/errore.php';

$templateParams["titolo"] = "Unitickets - Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["carosello"] = $dbh->getEventsInEvidence();




require("template/base.php");
?>

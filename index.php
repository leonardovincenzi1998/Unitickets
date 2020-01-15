<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Unitickets - Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["n_evidenza"] = $dbh->n_inEvidence();
$templateParams["carosello"] = $dbh->getEventsInEvidence();




require("template/base.php");
?>
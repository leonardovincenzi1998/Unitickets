<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Unitickets - Eventi";
$templateParams["nome"] = "categoria_singola.php";
$templateParams["categoria"]= $dbh->getCategoryById(1);
/*$templateParams["categorie"] = $dbh->getCategories();
$templateParams["n_evidenza"] = $dbh->n_inEvidence();
$templateParams["carosello"] = $dbh->getEventsInEvidence();*/

require("template/base.php");
?>

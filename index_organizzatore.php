<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Unitickets - Organizzatore";
$templateParams["nome"] = "organizzatore.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["eventi"] = $dbh->getEventsByIdOrganizer($_GET['idorganizer']);

require("template/base.php");
?>  
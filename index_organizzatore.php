<?php
require_once("bootstrap.php");
require_once 'access/errore_org.php';

$templateParams["titolo"] = "Unitickets - Organizzatore";
$templateParams["nome"] = "organizzatore.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["eventi"] = $dbh->getEventsByIdOrganizer($_SESSION['organizer_id']);

require("template/base_org.php");
?>

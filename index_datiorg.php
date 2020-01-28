<?php
require_once("bootstrap.php");
require_once 'access/errore_org.php';                //mi serve per vedere navbar giusta

$templateParams["titolo"] = "Unitickets - I miei dati";
$templateParams["nome"] = "dati_org.php";
$templateParams["organizzatore"]= $dbh->getOrganizerInfo($_SESSION['organizer_id']);

require("template/base_org.php");
?>
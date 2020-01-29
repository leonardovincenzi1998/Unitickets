<?php
require_once("bootstrap.php");
require_once 'access/errore_org.php';
require_once './access/functions_org.php';  

// sec_session_start();


$templateParams["titolo"] = "Unitickets - Notifiche";
$templateParams["nome"] = "notifiche_org.php";
$templateParams["organizzatore"] = $dbh->getOrganizerNotify($_SESSION['organizer_id']);

require_once("template/base_org.php");
?>
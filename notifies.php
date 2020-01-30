<?php
require_once("bootstrap.php");
require_once './access/errore.php';
require_once './access/functions.php';

//sec_session_start();

$templateParams["titolo"] = "Unitickets - Notifiche";
$templateParams["nome"] = "notifiche_cli.php";
$templateParams["cliente"] = $dbh->getAllNotifies($_SESSION['user_id']);

require_once './template/base.php';     //include_navbar.php si trova qui dentro
?>

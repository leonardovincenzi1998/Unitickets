<?php
require_once("bootstrap.php");
require_once 'access/functions.php';
sec_session_start();                   //mi serve per vedere navbar giusta

$templateParams["titolo"] = "Unitickets - I miei dati";
$templateParams["nome"] = "dati.php";
$templateParams["utente"]= $dbh->getUserInfo($_SESSION['user_id']);

require("template/base.php");
?>

<?php
require_once("bootstrap.php");
require_once 'access/functions.php';
sec_session_start();                   //mi serve per vedere navbar giusta

//var_dump($_SESSION);  //per debug, mostra variabili di sessione istanziate al login

$templateParams["titolo"] = "Unitickets - Eventi";
$templateParams["nome"] = "categoria_singola.php";
$templateParams["nome_categoria"] = $dbh->getCategoryNameById($_GET['idcategoria']);
$templateParams["categorie"] = $dbh->getEventsByCategoryId($_GET['idcategoria']);
//$templateParams["evento"] = $dbh->getEventsById($_GET['idevent']);
//$templateParams["nomeOrganizzatore"] = $dbh->getOrganizerNameByEvents();
//var_dump($templateParams["categorie"]);

require("template/base.php");
?>

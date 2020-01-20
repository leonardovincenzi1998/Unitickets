<?php
require_once("bootstrap.php");
require_once 'access/functions.php';
sec_session_start();                   //mi serve per vedere navbar giusta

$templateParams["titolo"] = "Unitickets - Eventi";
$templateParams["nome"] = "categoria_singola.php";
$templateParams["nome_categoria"] = $dbh->getCategoryNameById($_GET['idcategoria']);
$templateParams["categorie"] = $dbh->getEventsByCategoryId($_GET['idcategoria']);
//$templateParams["nomeOrganizzatore"] = $dbh->getOrganizerNameByEvents();


require("template/base.php");
?>

<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Unitickets - Eventi";
$templateParams["nome"] = "categoria_singola.php";
$templateParams["nome_categoria"] = $dbh->getCategoryNameById($_GET['idcategoria']);
$templateParams["categorie"] = $dbh->getEventsByCategoryId($_GET['idcategoria']); 
//$templateParams["evento"] = $dbh->getEventsById($_GET['idevent']);
//$templateParams["nomeOrganizzatore"] = $dbh->getOrganizerNameByEvents();   


require("template/base.php");
?>  
<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Unitickets - Eventi";
$templateParams["nome"] = "categoria_singola.php";
$templateParams["categorie"] = $dbh->getEventsByCategoryId($_GET['idcategoria']); 


require("template/base.php");
?>
<?php
require_once("bootstrap.php");
<<<<<<< HEAD
require("access/errore.php");
=======
require 'access/errore.php';
require 'access/functions.php'
>>>>>>> 47b2d0849f69510496e9ef8e01db7cd890c893dd

$templateParams["titolo"] = "Unitickets - Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["carosello"] = $dbh->getEventsInEvidence();




require("template/base.php");
?>

<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Unitickets - Home";
/*$templateParams["nome"] = "home.php";
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);*/
$templateParams["categorie"] = $dbh->getCategories();




require("template/base.php");
?>
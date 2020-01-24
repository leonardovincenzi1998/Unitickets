<?php
require_once("bootstrap.php");
require_once 'access/functions.php';
sec_session_start();

var_dump($_SESSION);

$templateParams["titolo"] = "Unitickets - Eventi in evidenza";
$templateParams["nome"] = "eventi_inevidenza.php";
$templateParams["inevidenza"]=$dbh->getInEvidenceInfo();


require("template/base.php");
?>
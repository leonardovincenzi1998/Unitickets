<?php
require_once("bootstrap.php");
require_once './access/errore.php';
require_once './access/functions.php';

//sec_session_start();

$templateParams["titolo"] = "Unitickets - Ordini";
$templateParams["nome"] = "myOrders.php";
$templateParams["details"] = $dbh->getTotal($_SESSION['user_id']);
// $templateParams["details_modal"] = $dbh->getMyOrdersModal($_SESSION['user_id']);
// $templateParams["details_modal"] = $dbh->rowsModal($event);
// var_dump($templateParams['details_modal']);
// var_dump($_SESSION);

require_once './template/base.php';     //include_navbar.php si trova qui dentro
?>

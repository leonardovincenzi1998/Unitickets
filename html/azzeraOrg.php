<?php
//azzera.php  
require_once("../bootstrap.php");
require_once '../access/errore.php';
require_once '../access/functions.php';
//sec_session_start();
//var_dump($_SESSION['user_id']);
//echo "<script>console.log('diocristo')</script>";
//$ciao=2;
$templateParams["azzeratutto"]= $dbh->zeroNotifiesOrg($_SESSION['organizer_id']);


?>
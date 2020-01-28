<?php
// include 'register_functions.php';
require_once 'access/functions.php';
require_once("bootstrap.php");
sec_session_start();

$templateParams["modifica"]= $dbh->ModifyDatiOrg($_POST['email'], $_POST['tel'], $_SESSION['organizer_id']);

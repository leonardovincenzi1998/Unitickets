<?php
// include 'register_functions.php';
require_once 'access/functions.php';
require_once("bootstrap.php");
sec_session_start();

//var_dump($_POST['idorganizzatore']);
$templateParams["nomeevento"]= $dbh->EventIdToName($_POST['idevento']);
$nomeevento=$templateParams["nomeevento"];

if ($_POST['action'] == 'Accetta') {


    $approvato="Approvato";
    $in_evidenza=0;
    $descrizione="Il tuo evento ". $templateParams["nomeevento"] ." è stato Accettato";
    $templateParams["update"]= $dbh->AdminApproved($approvato, $in_evidenza, $_POST['idevento']);
    $templateParams["notificaorg"]= $dbh->Admin_Action($descrizione,$_POST['idorganizzatore']);


} else if ($_POST['action'] == 'Rifiuta') {

    $approvato="Rifiutato";
    $in_evidenza=0;
    $descrizione="Il tuo evento ". $templateParams["nomeevento"] ."' è stato Rifiutato";
    $templateParams["update"]= $dbh->AdminApproved($approvato, $in_evidenza, $_POST['idevento']);
    $templateParams["notificaorg"]= $dbh->Admin_Action($descrizione,$_POST['idorganizzatore']);

} else {

    $approvato="In evidenza";
    $in_evidenza=1;
    $descrizione="Il tuo evento ". $templateParams["nomeevento"] ." è In Evidenza";
    $templateParams["update"]= $dbh->AdminApproved($approvato, $in_evidenza, $_POST['idevento']);
    $templateParams["notificaorg"]= $dbh->Admin_Action($descrizione,$_POST['idorganizzatore']);
}

?>

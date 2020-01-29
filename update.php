<?php
//update.php  
require_once("bootstrap.php");
require_once 'access/errore.php';
require_once 'access/functions.php';
//sec_session_start();

if(!empty($_POST['place2']) && !empty($_POST['data2']) &&
     !empty($_POST['seats2'])){
         
     //$ticket=($templateParams["biglietti"]=$dbh->ticket_available($_POST['id1']));     
     $templateParams["modifica"]= $dbh->ModifyEvents($_POST['id1'],$_POST['place2'],$_POST['data2'],$_POST['seats2'], $templateParams["biglietti"]=$dbh->ticket_available($_POST['id1']),$templateParams["bigliettitotali"]=$dbh->total_ticket($_POST['id1']));
     $templateParams["nomeevento"]= $dbh->EventIdToName($_POST['id1']);
     $descrizione="L'evento: ". $templateParams["nomeevento"]." ha subito delle modifiche";
     $templateParams["utenti"]= $dbh->selectUsersBought($_POST['id1']);
          //var_dump($templateParams["utenti"]);
     foreach($templateParams["utenti"] as $utente):
          //var_dump($utente["user_id"]);
          // var_dump($templateParams["nomeevento"]);
          $templateParams["notifica"]= $dbh->changeEventNotify($utente["user_id"],$descrizione);
     endforeach;
     header("location: ./index_organizzatore.php?atype=cli&error=upd");
     }
     else{
          header("location: ./index_organizzatore.php?atype=cli&error=nupd");
     }

?>
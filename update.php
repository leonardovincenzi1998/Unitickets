<?php
//update.php  
require_once("bootstrap.php");
require_once 'access/errore.php';
require_once 'access/functions.php';
sec_session_start();
if(!empty($_POST['name2']) && !empty($_POST['place2']) && !empty($_POST['data2']) &&
     !empty($_POST['seats2']) && !empty($_POST['price2']) && !empty($_POST['desc2']) ){

     $templateParams["modifica"]= $dbh->ModifyEvents($_POST['id1'],$_POST['name2'], $_POST['place2'],$_POST['data2'],$_POST['seats2'],$_POST['price2'],$_POST['desc2']);
     }
     else{
          header("location: ./index_organizzatore.php?atype=cli&error=nupd");
     }

?>
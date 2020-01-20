<!-- file da includere nelle varie pagine per visualizzazione
     della navbar a seconda che l'utente sia loggato o meno  -->
<?php
require_once 'access/functions.php';
// sec_session_start();

if(login_check($mysqli)){
  require_once './html/navbar-userLogged.php';  //cambiare percorso
}
else {
  require_once './html/navbar-toLog.php';      //cambiare percorso
}

?>

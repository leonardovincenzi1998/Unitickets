<?php
// include 'db_connect.php'; commentato perchè incluso in functions.php
include 'functions.php';
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
if(isset($_POST['email'], $_POST['p'])) {
   $email = $_POST['email'];
   $password = $_POST['p']; // Recupero la password criptata.
   if(login($email, $password, $mysqli) == true) {
      // Login eseguito
      header('Location: ../index.php?error=logok');
      // echo 'Success: You have been logged in!';
      // var_dump($_SESSION);
      // if(login_check($mysqli))
   } else {
      // Login fallito
      //
      if(empty($email) || empty($password)){
        header('Location: ./login.php?error=log1');
      }
      else{
      //
      header('Location: ./login.php?error=log');
      }
   }
} else {
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
}

?>

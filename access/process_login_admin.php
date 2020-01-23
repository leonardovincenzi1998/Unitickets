<?php
  require_once 'functions_admin.php';
  sec_session_start();
  // require_once 'errore.php';



  if(isset($_POST['email'], $_POST['p'])) {
     $email = $_POST['email'];
     $password = $_POST['p']; // Recupero la password criptata.
     if(login($email, $password, $mysqli) == true) {
        // Login eseguito
        header('Location: ../html/admin.php?error=logok');
        // echo 'Success: You have been logged in!';
        // var_dump($_SESSION);
        // if(login_check($mysqli))
     } else {
        // Login fallito
        //
        if(empty($email) || empty($password)){

          header('Location: ./login_admin.php?error=log1');
        }
        else{
        //
        header('Location: ./login_admin.php?error=log');
        }
     }
  } else {
     // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
     echo 'Invalid Request';
  }



 ?>

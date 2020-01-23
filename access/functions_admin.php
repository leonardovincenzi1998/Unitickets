<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<?php
require_once 'db_connect.php';
function sec_session_start() {
        $session_name = 'sec_session_id'; // Imposta un nome di sessione
        $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
        $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
        ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
        $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
        session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
        session_start(); // Avvia la sessione php.
        session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}


function login($email, $password, $mysqli) {
   if ($stmt = $mysqli->prepare("SELECT admin_id, admin_password, admin_salt FROM admin WHERE admin_email = ? LIMIT 1")) {
      $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
      $stmt->execute(); // esegue la query appena creata.
      $stmt->store_result();
      $stmt->bind_result($admin_id, $db_password, $salt);
      // recupera il risultato della query e lo memorizza nelle relative variabili.
      $stmt->fetch();
      $password = hash('sha512', $password.$salt); // codifica la password usando una chiave univoca.
      if($stmt->num_rows == 1) { // se l'utente esiste
         // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
         // if(checkbrute($admin_id, $mysqli) == true) {
         //    // Account disabilitato
         //    // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
         //    return false;
         // } else {
         if($db_password == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
            // Password corretta!
            // echo "password corretta!";
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.

               $admin_id = preg_replace("/[^0-9]+/", "", $admin_id); // ci proteggiamo da un attacco XSS
               $_SESSION['admin_id'] = $admin_id;
               // $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
               // $_SESSION['username'] = $username;
               $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
               // Login eseguito con successo.
               return true;
      //    } else {
      //      // echo "Password sbagliata";
      //       // Password incorretta.
      //       // Registriamo il tentativo fallito nel database.
      //       $now = time();
      //       $mysqli->query("INSERT INTO login_attempts (admin_id, time) VALUES ('$admin_id', '$now')");
      //       return false;
      //    }
      }
      } else {
         // L'utente inserito non esiste.
         //CREARE ALERT O SIMILI
         return false;
      }
   }
}

// funzione per proteggere le pagine -> controlla se hai effettuato login
function login_check($mysqli) {
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['admin_id'], $_SESSION['login_string'])) {
     $admin_id = $_SESSION['admin_id'];
     $login_string = $_SESSION['login_string'];
     // $username = $_SESSION['username'];
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
     if ($stmt = $mysqli->prepare("SELECT admin_password FROM admin WHERE admin_id = ? LIMIT 1")) {
        $stmt->bind_param('i', $admin_id); // esegue il bind del parametro '$admin_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();

        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) {
              // Login eseguito!!!!
              return true;
           } else {
              //  Login non eseguito
              return false;
           }
        } else {
            // Login non eseguito
            return false;
        }
     } else {
        // Login non eseguito
        return false;
     }
   } else {
     // Login non eseguito
     return false;
   }
}

?>

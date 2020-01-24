<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script> src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
  <?php require_once '../access/errore.php';
  function login_check_admin($mysqli) {
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
        // require_once '../access/functions_admin.php ';
   if(login_check_admin($mysqli)){ ?>

    <nav class="navbar navbar-light navbar-expand-sm bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Unitickets</a>
        <div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="../access/logout.php" class="nav-link">Logout</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">Registrati</a>
                </li> -->
            </ul>
        </div>
    </div>
    </nav>
  <?php }

    //var_dump($_SESSION); //ME LO STAMPA CMQ UNA VOLTA PERCHè C'è IN ERRORE.PHP ?>
    <div class="text-center">
        <hr class="upCat">
        <h2>Tutti gli eventi in sospeso</h2>
        <hr class="downCat">
    </div>
    <!--Eventi-->
    <div id="events" class="container-fluid padding">
    <div class="row padding">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Cado dalle nubi</h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th id="Luogo" scope="row">Luogo</th>
                            <td headers="Luogo" id="nomeLuogo">Uci Romagna Center</td>
                        </tr>
                        <tr>
                            <th id="Data" scope="row">Data</th>
                            <td headers="Data" id="dataEv">02-10-98</td>
                        </tr>
                        <tr>
                            <th id="Organizzatore" scope="row">Organizzatore</th>
                            <td headers="Organizzatore" id="nomeOrg">Leonardo vincenzi</td>
                        </tr>
                        <tr>
                            <th id="Posti disponibili" scope="row">Posti disponibili</th>
                            <td headers="Posti disponibili" id="numPosti">100</td>
                        </tr>
                        <tr>
                            <th id="Prezzo" scope="row">Prezzo</th>
                            <td headers="Prezzo" id="costoBiglietto">6 <i class="fa fa-euro"></i></td>
                        </tr>
                    </table>
                    <button id="btn-event" type="button" class="btn btn-success">Accetta evento</button>
                    <button id="btn-event" type="button" class="btn btn-danger">Rifiuta evento</button>
                    <button id="btn-event" type="button" class="btn btn-primary">Accetta evento e metti in evidenza</button>


                    <!--<button id="btn-info" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#infoModal">+info</button>
                    <div id="infoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel">Info relative all'evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Qua bisogna scrivere la descrizione dell'evento
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Nome dell'evento</h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th scope="row">Luogo</th>
                            <td id="nomeLuogo">Uci Romagna Center</td>
                        </tr>
                        <tr>
                            <th scope="row">Data</th>
                            <td id="dataEv">02-10-98</td>
                        </tr>
                        <tr>
                            <th scope="row">Organizzatore</th>
                            <td id="nomeOrg">Leonardo vincenzi</td>
                        </tr>
                        <tr>
                            <th scope="row">Posti disponibili</th>
                            <td id="numPosti">100</td>
                        </tr>
                        <tr>
                            <th scope="row">Prezzo</th>
                            <td id="costoBiglietto">6 <i class="fa fa-euro"></i></td>
                        </tr>
                    </table>
                    <button id="btn-event" type="button" class="btn btn-outline-secondary">Aggiungi al carrello</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Nome dell'evento</h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th scope="row">Luogo</th>
                            <td id="nomeLuogo">Uci Romagna Center</td>
                        </tr>
                        <tr>
                            <th scope="row">Data</th>
                            <td id="dataEv">02-10-98</td>
                        </tr>
                        <tr>
                            <th scope="row">Organizzatore</th>
                            <td id="nomeOrg">Leonardo vincenzi</td>
                        </tr>
                        <tr>
                            <th scope="row">Posti disponibili</th>
                            <td id="numPosti">100</td>
                        </tr>
                        <tr>
                            <th scope="row">Prezzo</th>
                            <td id="costoBiglietto">6 <i class="fa fa-euro"></i></td>
                        </tr>
                    </table>
                    <button id="btn-event" type="button" class="btn btn-outline-secondary">Aggiungi al carrello</i></button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Footer-->
    <footer>
        <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <hr class="light">
                <h5>Contatti</h5>
                <hr class="light">
                <p>leonardo.delvecchio@studio.unibo.it</p>
                <p>leonardo.vincenzi@studio.unibo.it</p>
                <p>filippo.tartagni@studio.unibo.it</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Social</h5>
                <hr class="light">
                <div id="socials" class="display-3 social-padding">
                    <a href="#"><i class="fa fa-facebook-official"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Metodi di pagamento</h5>
                <hr class="light">
                <div id="payments" class="display-3 payments-padding">
                    <a href="#"><i class="fa fa-cc-visa"></i></a>
                    <a href="#"><i class="fa fa-cc-paypal"></i></a>
                    <a href="#"><i class="fa fa-cc-amex"></i></a>
                    <a href="#"><i class="fa fa-cc-mastercard"></i></a>
                </div>
            </div>
            <div class="col-md-12">
                <hr class="light-100">
                <h5>&copy; Unitickets.com</h5>
            </div>
        </div>
        </div>
    </footer>

</body>
</html>
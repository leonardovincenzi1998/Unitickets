<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script> src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"</script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
  <?php require_once '../access/errore.php';
        require_once("../bootstrap.php");
        
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
    <?php 


$templateParams["eventi"]= $dbh->getAdminEvents();
//var_dump($templateParams["eventi"]);
?>

    <div class="text-center">
        <hr class="upCat">
        <h2>Eventi in sospeso</h2>
        <hr class="downCat">
    </div>
    <div id="events" class="container-fluid padding">
    <div class="row padding">
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title">Aggiungi categoria</h4>
                </div>
                <div class="card-body">
    <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="createCategoryTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="createCategoryTitle">Aggiungi categoria</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="was-validated" novalidate method="post" id="add_category">
                                        <div class="form-group">
                                            <label for="name">Nome categoria</label>
                                            <input type="text" class="form-control" name="name" id="name" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Descrizione</label>
                                            <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="img">Immagine</label>
                                            <input type="text" class="form-control" name="img" id="img" required>
                                        </div>
                                        <input type="submit" name="insert" id="insert" value="Crea categoria" class="btn btn-success" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fine modale creazione evento -->
                    <button id="btn-cat" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createCategory" >Crea categoria</button>
                </div>
            </div>
        </div>
    <!--Eventi vecchio admin-->
    <?php $cont=-1; ?>
    <?php foreach($templateParams["eventi"] as $evento): 
        $cont++; ?>
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $evento["event_name"]; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" style="line-height: 1;">
                    <tr>
                            <th id="Prezzo" scope="row">Categoria</th>
                            <td headers="Prezzo" id="costoBiglietto"><?php echo $evento["category_name"] ?></td>
                        </tr>
                        <tr>
                            <th id="Luogo" scope="row">Luogo</th>
                            <td headers="Luogo" id="nomeLuogo"><?php echo $evento["event_place"] ?></td>
                        </tr>
                        <tr>
                            <th id="Data" scope="row">Data</th>
                            <td headers="Data" id="dataEv"><?php echo $evento["event_date"] ?></td>
                        </tr>
                        <tr>
                            <th id="Organizzatore" scope="row">Organizzatore</th>
                            <td headers="Organizzatore" id="nomeOrg"><?php echo $evento["organizer_name"]; echo ' ';echo $evento["organizer_surname"] ?></td>
                        </tr>
                        <tr>
                            <th id="Posti disponibili" scope="row">Posti disponibili</th>
                            <td headers="Posti disponibili" id="numPosti"><?php echo $evento["total_ticket"] ?></td>
                        </tr>
                        <tr>
                            <th id="Prezzo" scope="row">Prezzo</th>
                            <td headers="Prezzo" id="costoBiglietto"><?php echo $evento["ticket_price"] ?><i class="fa fa-euro"></i></td>
                        </tr>
                        <tr>
                            <th id="Prezzo" scope="row">Descrizione</th>
                            <td headers="Prezzo" id="costoBiglietto"><?php echo $evento["descriptions"] ?></td>
                        </tr>
                        <form action="../evento_admin.php" method="POST">
                        <input type="hidden" id="idevento" name="idevento" value="<?php echo $evento["event_id"] ?>" />
                        <input type="hidden" id="idorganizzatore" name="idorganizzatore" value="<?php echo $evento["organizer_id"] ?>" />
                    </table>
                    <button id="btn-event" type="submit" name="action" class="btn btn-success" value="Accetta" >Accetta evento</button>
                    <button id="btn-event" type="submit" name="action" class="btn btn-danger" value="Rifiuta">Rifiuta evento</button>
                    <button id="btn-event" type="submit" name="action" class="btn btn-primary" value="Evidenza">Accetta e in evidenza</button>
                    </form>
                </div>
            </div>
        </div>     
    <?php endforeach; ?>
    
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

<script>
$(document).ready(function(){
 $('#add_category').on("submit", function(event){
  event.preventDefault();
  if($('#name').val() == "")
  {
   alert("Inserire il nome della categoria");
  }
  else if($('#desc').val() == '')
  {
   alert("Inserire la descrizione della categoria");
  }
  else if($('#img').val() == '')
  {
   alert("Inserire l'immagine della categoria");
  }

  else
  {

   $.ajax({
    url:"insert_cat.php",
    method:"POST",  
    data:$('#add_category').serialize(),
    beforeSend:function(){
     $('#insert').val("Inserting");
    },
    success:function(data){
     $('#add_category')[0].reset();
     window.location.href = "./admin.php";
     //$('#createCategory').hide();
     $('#btn-cat').modal('hide');
     //header("location: ./index_organizzatore.php?atype=cli&error=ins");
     //window.location.replace="./index_organizzatore.php";

     //$('#employee_table').html(data);
    }
   });
  }
 });
});
</script>


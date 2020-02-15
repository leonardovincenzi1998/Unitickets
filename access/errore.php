<?php
require_once 'functions.php'; //add push 23/01 ft
sec_session_start();
if(!empty($_GET['error'])){
  if($_GET['error']=="reg") {?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p class="text-md-center"><strong>Errore!</strong> Riempi tutti i campi per registrarti. </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php }
  else if($_GET['error']=="reg1") { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <p class="text-md-center"> <strong>Errore!</strong> L'e-mail inserita è già associata ad un altro account.</p>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php }

 else if($_GET['error']=="regok") { ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <p class="text-md-center"> <strong>Benvenuto!</strong> Ti sei registrato correttamente</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 <?php }

 else if($_GET['error']=="log") { ?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <p class="text-md-center"> <strong>Errore!</strong> Password inserita errata.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php
  }
  else if($_GET['error']=="logok") { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p class="text-md-center"> <strong>Bentornato!</strong> Login eseguito correttamente.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
 <?php
   // if(login_check($mysqli)==true){
   //   echo "$user_id";
   //   echo "$login_string";
   //   echo "$username";
   //   echo "prova";
     // }
  //var_dump($_SESSION);
  // if(login_check($mysqli)){
  // }
  }
  else if($_GET['error']=="log1") { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <p class="text-md-center"> <strong>Errore!</strong> Compila i campi per il Login.</p>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php
 }
 else if($_GET['error']=="logout") { ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <p class="text-md-center"> <strong>Arrivederci!</strong> Logout eseguito correttamente.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 <?php
 }

 else if($_GET['error']=="mod") { ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <p class="text-md-center"> <strong>Ottimo!</strong> Dati modificati correttamente.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 <?php }


  else if($_GET['error']=="ord") { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p class="text-md-center"> <strong>Perfetto!</strong> Ordine effettuato correttamente.</p>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
  <?php
  }

  else if($_GET['error']=="mail") { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p class="text-md-center"> <strong>Errore!</strong> Inserisci una mail valida.</p>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
  <?php }

}
 ?>

<script type="text/javascript">
    // show the alert
    setTimeout(function() {
        $(".alert-dismissible").alert('close');
    }, 2000);
</script>

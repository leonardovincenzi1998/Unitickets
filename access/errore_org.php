<?php
include 'functions_org.php';     //nb
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
      <p class="text-md-center"> <strong>Errore!</strong> E-mail già associata ad un altro account.</p>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php }

 else if($_GET['error']=="regok") { ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <p class="text-md-center"> <strong>Ci siamo!</strong> Ti sei registrato correttamente</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 <?php }

 else if($_GET['error']=="log") { ?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <p class="text-md-center"> <strong>Errore!</strong> Password sbagliata.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
  }
  else if($_GET['error']=="logok") { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p class="text-md-center"> <strong>Ci Siamo!</strong> Login eseguito.</p>
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
  //   echo "DAJE!";
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

 else if($_GET['error']=="upd") { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <p class="text-md-center"> <strong>Ottimo!</strong> Evento modificato correttamente.</p>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
<?php }

 else if($_GET['error']=="nupd") { ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p class="text-md-center"> <strong>Errore!</strong> Compila tutti i campi.</p>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
<?php }

else if($_GET['error']=="ins") { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <p class="text-md-center"> <strong>Ottimo!</strong> Evento creato correttamente.</p>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
<?php }

else if($_GET['error']=="mod1") { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <p class="text-md-center"> <strong>Ottimo!</strong> Dati modificati correttamente.</p>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
<?php }
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
        $(".alert-dismissible").slideUp();
    }, 3000);
</script>

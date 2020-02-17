
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="../css/style.css" type="text/css" rel="stylesheet">
  <script type="text/javascript" src="sha512.js"></script>
  <script type="text/javascript" src="forms.js"></script>
  <title>Unitickets - Registrazione</title>
</head>
<body>
  <?php include 'errore.php'; ?>
  <div class="container justify-content-center col-md-4">
    <hr class="upRegister">
    <!-- <h2 class="text-center">Registrazione</h2> -->

    <?php if($_GET['atype']=="cli"){
      ?> <h2 class="text-center">Registrazione Clienti </h2> <?php
    }
    else{
      ?> <h2 class="text-center">Registrazione Organizzatori </h2> <?php
    }
    ?>

     <hr class="downRegister">


      <?php require_once 'rtype.php' ?>
    </div>
  </div>
</body>
</html>

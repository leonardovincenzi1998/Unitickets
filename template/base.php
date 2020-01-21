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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title><?php echo $templateParams["titolo"];?></title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <?php require_once 'include_navbar.php'; ?>
    <!-- <nav class="navbar navbar-light navbar-expand bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Unitickets</a>
        <div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="access/login.php" class="nav-link">Accedi</a>
                </li>
                <li class="nav-item">
                    <a href="access/register.php" class="nav-link">Registrati</a>
                </li>
            </ul>
        </div>
    </div>
    </nav> -->
    <?php require($templateParams["nome"]); ?>
    <!--Contatti-->
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

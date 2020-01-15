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
    <title><?php echo $templateParams["titolo"];?></title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-sm bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Unitickets</a>
        <div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="#" class="nav-link">Accedi</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Registrati</a>
                </li>
            </ul>
        </div>
    </div>    
    </nav>
    <!--qui faccio un carosello dei vari eventi-->
    <div id="slides" class="carousel slide" data-ride="carousel">
        <!--indicators-->
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
            <li data-target="#slides" data-slide-to="4"></li>
            <li data-target="#slides" data-slide-to="5"></li>
        </ul>
        <!--slideshow-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="upload/cinema.jpg" alt="Cinema">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all'evento</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="upload/mostra.jpg" alt="Mostra">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all'evento</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="upload/teatro.jpg" alt="Teatro">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all'evento</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="upload/party.jpg" alt="Party">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all'evento</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="upload/museo.jpg" alt="Museo">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all'evento</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="upload/concerto.jpg" alt="Concerto">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all'evento</button>
                </div>
            </div>
        </div>
        <!--left and right controls
        <a href="slides" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="slides" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>-->
    </div>
     <!--Creo le categorie di eventi-->
    <div id="titoloCat" class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-md-12">
            <h1 class="display-4">Categorie</h1>
        </div>
    </div>    
    </div>
    <!--creo le "carte"delle categorie-->
    <div class="container-fluid padding">
    <div class="row padding"> 
    <?php foreach($templateParams["categorie"] as $categoria): ?>
        <div class="col-md-4">
            <div class="card">
                <img src="<?php echo $categoria["image_url"] ?>" alt="Categoria <?php echo $categoria["category_name"]; ?> " class="card-imd-top">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $categoria["category_name"]; ?></h4>
                    <p class="card-text">Acquista il tuo biglietto premendo il bottone</p>
                    <button type="button" class="btn btn-outline-secondary">Vai alla categoria</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>    
    </div>        
    </div>
    <hr>
    <!--Contatti-->
    <footer>
        <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <h5 class="display-4 contacts">Contatti</h5>   
                <hr>
                <p>leonardo.delvecchio@studio.unibo.it</p>
                <p>leonardo.vincenzi@studio.unibo.it</p>
                <p>filippo.tartagni@studio.unibo.it</p>
            </div>
            <div class="col-md-4">
                <h5 class="display-4 social">Social</h5>
                <hr>
                <div class="display-3 social-padding">
                    <a href="#"><i class="fa fa-facebook-official" style="color:blue;"></i></a>
                    <a href="#"><i class="fa fa-instagram" style="color:darkviolet;"></i></a>
                    <a href="#"><i class="fa fa-twitter" style="color: cyan;"></i></a>
                    <a href="#"><i class="fa fa-google-plus" style="color: red;"></i></a>
                    <a href="#"><i class="fa fa-youtube" style="color:red;"></i></a>
                    <a href="#"><i class="fa fa-pinterest" style="color: darkred;"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="display-4 pay">Metodi di pagamento</h5>
                <hr>
                <div class="display-3 payments-padding">
                    <a href="#"><i class="fa fa-cc-visa" style="color: yellow white;"></i></a>
                    <a href="#"><i class="fa fa-cc-paypal" style="color: cyan;"></i></a>
                    <a href="#"><i class="fa fa-cc-amex" style="color: blue;"></i></a>
                    <a href="#"><i class="fa fa-cc-mastercard" style="color:darkred;"></i></a>
                </div>
            </div>
        </div>
        </div>
    </footer>
</body>
</html>
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
    <!--creo le "carte" delle categorie-->
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
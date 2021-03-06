<!--qui faccio un carosello dei vari eventi-->
<?php require_once 'appunti_url.php'; ?>
<div id="slides" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner" >
    <form action="index_inevidenza.php" method="POST">
        <!--slideshow-->
        <?php echo $templateParams["carosello"];?>
    </form>
    </div>
    <!--left and right controls-->
        <a href="#slides" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="#slides" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
</div>
<!--Creo le categorie di eventi-->
<div id="titoloCat" class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-md-12">
            <hr class="downCat">
            <h4 class="display-4">Categorie</h4>
            <hr class="downCat">
        </div>
    </div>
</div>
<!--creo le "carte" delle categorie-->
<div id="categories" class="container-fluid padding">
    <div class="row padding">
        <?php foreach($templateParams["categorie"] as $categoria): ?>
        <div id="cardPadding" class="col-md-4">
            <div class="card" id="cartehome">
                <img src="<?php echo UPLOAD_DIR.$categoria["image_url"]?>" alt="Categoria <?php echo $categoria["category_name"];?>" class="card-imd-top">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $categoria["category_name"]; ?></h4>
                    <p class="card-text"><?php echo $categoria["description"]; ?></p>
                    <form action="index_categoria.php?idcategoria=<?php echo $categoria["category_id"]?>" method="POST">
                        <button type="submit" class="btn btn-outline-primary" >Vai alla categoria</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- </form> -->
        <?php endforeach; ?>
    </div>
</div>

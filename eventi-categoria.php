<div id="titoloCat" class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-md-12">
            <h1 class="display-4"><?php echo $categoria["category_name"]?></h1>
        </div>
    </div>    
    </div>
    <div class="container-fluid padding"><!--creo le "carte" delle categorie-->
    <!--<div class="row padding"> 
    < ?php foreach($templateParams["categorie"] as $categoria): ?>
        <div class="col-md-4">
            <div class="card">
                <img src="< ?php echo $categoria["image_url"] ?>" alt="Categoria < ?php echo $categoria["category_name"]; ?> " class="card-imd-top">
                <div class="card-body">
                    <h4 class="card-title">< ?php echo $categoria["category_name"]; ?></h4>
                    <p class="card-text">< ?php echo $categoria["description"]; ?></p>
                    <button type="button" class="btn btn-outline-secondary">Vai alla categoria</button>
                </div>
            </div>
        </div>
    < ?php endforeach; ?>    
        </div>        
    </div>
    <hr>
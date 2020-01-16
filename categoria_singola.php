<!--inserisco gli eventi divisi per categoria-->
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Eventi della categoria:</li>
        </ol>
    </nav>
    <!--Eventi-->
    <div class="container-fluid padding">
    <div class="row padding">
    <?php foreach($templateParams["categorie"] as $categoria): ?>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $categoria["event_name"]; ?></h4>
                    <hr>
                </div>
            </div>
        </div>
        <?php endforeach;?>  
    </div>
    </div>
<!--inserisco gli eventi divisi per categoria-->
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categoria:<?php echo $templateParams["nome_categoria"];?></li>
        </ol>
    </nav>
    <!--Eventi-->
    <div class="container-fluid padding">
    <div class="row padding">
    <?php foreach($templateParams["categorie"] as $categoria): 
        var_dump($categoria);?>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $categoria["event_name"]; ?></h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th scope="row">Luogo</th>
                            <td id="nomeLuogo"><?php echo $categoria["event_place"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Data</th>
                            <td id="dataEv"><?php echo $categoria["event_date"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Organizzatore</th>
                            <td id="nomeOrg"><?php echo $categoria["organizer_name"]; echo ' ';echo $categoria["organizer_surname"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Prezzo</th>
                            <td id="costoBiglietto"><?php echo $categoria["ticket_price"]; ?> <i class="fa fa-euro"></i></td>
                        </tr>                        
                    </table>
                    <button id="btn-event" type="button" class="btn btn-primary">Aggiungi al carrello</button>
                    <button id="btn-info" type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoModal">Dettagli</button>
                    <div id="infoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel"><?php echo $categoria[0]["event_name"]; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <?php echo $categoria["descriptions"]; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>  
    </div>
    </div>
<!--inserisco gli eventi divisi per categoria-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="index.php#categories">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categoria:<?php echo $templateParams["nome_categoria"];?></li>
    </ol>
</nav>

<!--Eventi-->
<div id="events" class="container-fluid padding">
    <div class="row padding">
    <?php
    
    $infomodal= 0;
    if(sizeof($templateParams["categorie"])==0){
        ?>
        <div class="container justify-content-center col-md-4">
            <hr class="upRegister">
            <h4 class="text-center">Non sono presenti eventi nella categoria <?php echo $templateParams["nome_categoria"];?></h4>
            <hr class="downRegister"> 
        
    <?php
    } else {
    foreach($templateParams["categorie"] as $categoria):
        $infomodal++;
    ?>
    <div id="orgEvent" class="col-xl-4">
        <div class="card text-center">
            <div class="card-header" >
                <h4 class="card-title"><?php echo $categoria["event_name"]; ?></h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table" style="line-height: 1;">
                    <tr>
                        <th id="Luogo" scope="row">Luogo</th>
                        <td headers="Luogo" id="nomeLuogo" class="text-right"><?php echo $categoria["event_place"]; ?></td>
                    </tr>
                    <tr>
                        <th id="Data" scope="row">Data e ora</th>
                        <td headers="Data" id="dataEv" class="text-right"><?php echo $categoria["event_date"]; ?></td>
                    </tr>
                    <tr>
                        <th id="Organizzatore" scope="row">Organizzatore</th>
                        <td headers="Organizzatore" id="nomeOrg" class="text-right"><?php echo $categoria["organizer_name"]; echo ' ';echo $categoria["organizer_surname"] ?></td>
                    </tr>
                    <tr>
                        <th id="Prezzo" scope="row">Prezzo</th>
                        <td headers="Prezzo" id="costoBiglietto" class="text-right"><?php echo $categoria["ticket_price"]; ?> <i class="fa fa-euro"></i></td>
                    </tr>
                </table>
                
                <?php
                $cat = $categoria["category_id"];
                $evento = $categoria['event_id'];
                ?>
                
                <form action="cart.php?idcategoria=<?php echo $cat;?>&id_evento=<?php echo $evento;?>" method="post">
                        <input type="hidden" name="id_evento" value="<?php echo $categoria["event_id"];?>">
                        <input type="hidden" name="nome_evento" value="<?php echo $categoria["event_name"];?>">
                        <input type="hidden" name="prezzo_evento" value="<?php echo $categoria["ticket_price"];?>">
                        <div class="text-center">
                            <button id="infoButton" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#_<?php echo $infomodal; ?>">Vedi dettagli evento</button>
                        </div>
                        <label id="nomeQuantità" for="selectQuantity">Q.tà</label>
                        <select class="form-control" id="selectQuantity" name="qtà_evento">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <button id="btn-event" type="submit" name="aggiungi_al_carrello" class="btn btn-outline-primary">Aggiungi al carrello</button>
                </form>
                
                <div id="_<?php echo $infomodal; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="infoModalLabel"><?php echo $categoria["event_name"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php echo $categoria["descriptions"]; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php endforeach;
        } ?>
        </div>
    </div>
</div>

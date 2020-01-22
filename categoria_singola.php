<!--inserisco gli eventi divisi per categoria-->
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categoria:<?php echo $templateParams["nome_categoria"];?></li>
        </ol>
    </nav>
    <!--Eventi-->
    <div id="events" class="container-fluid padding">
    <div class="row padding">
    <?php 
    //$cont = 0;
    $infomodal= 0;
    if(sizeof($templateParams["categorie"])==0){
        ?> <div class="container justify-content-center col-md-4">
        <hr class="upRegister">
        <h4 class="text-center">Non sono presenti eventi nella categoria <?php echo $templateParams["nome_categoria"];?></h4>
        <hr class="downRegister"> <?php
    } else {
    foreach($templateParams["categorie"] as $categoria): 
        //var_dump($categoria);
        $infomodal++;
        ?>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $categoria["event_name"]; ?></h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th id="Luogo" scope="row">Luogo</th>
                            <td headers="Luogo" id="nomeLuogo" class="text-center"><?php echo $categoria["event_place"]; ?></td>
                        </tr>
                        <tr>
                            <th id="Data" scope="row">Data</th>
                            <td headers="Data" id="dataEv" class="text-center"><?php echo $categoria["event_date"]; ?></td>
                        </tr>
                        <tr>
                            <th id="Organizzatore" scope="row">Organizzatore</th>
                            <td headers="Organizzatore" id="nomeOrg" class="text-center"><?php echo $categoria["organizer_name"]; echo ' ';echo $categoria["organizer_surname"] ?></td>
                        </tr>
                        <tr>
                            <th id="Prezzo" scope="row">Prezzo</th>
                            <td headers="Prezzo" id="costoBiglietto" class="text-center"><?php echo $categoria["ticket_price"]; ?> <i class="fa fa-euro"></i></td>
                        </tr>                        
                    </table>
                    <button id="btn-event" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#cartModalLabel">Aggiungi al carrello</button>
                    <div id="cartModalLabel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cartModalLabelTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Metodo di pagamento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#">
                                        <p>Seleziona il metodo di pagamento:</p>
                                            <input type="radio" name="pagamento" value="Paypal"> <i class="fa fa-cc-paypal"></i>  <input id="email_pp" type="email" name="pagamento" placeholder="Email" required></br>
                                            <input type="radio" name="pagamento" value="other cards"> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-amex"></i> <input id="n_carta" type="tel" name="pagamento" placeholder="Numero della carta" maxlength="16" required> <input type="number" name="pagamento" min="1" max="12"> <input type="number" name="pagamento" min="21" max="29"></br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="submit" class="btn btn-outline-secondary">Aggiungi al carrello</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="btn-info" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#<?php echo $infomodal; ?>">Dettagli</button>
                    <div id="<?php echo $infomodal; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
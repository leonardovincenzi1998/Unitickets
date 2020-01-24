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
<<<<<<< HEAD

                    <button id="btn-event" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#shoppingchartModalCenter">Aggiungi al carrello</button>
                    <div class="modal fade" id="shoppingchartModalCenter" tabindex="-1" role="dialog" aria-labelledby="shoppingchartModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shoppingchartModalCenterTitle">Carrello</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="div_table_chart"class="table-responsive-sm">
                                    <table id="tableChart" class="table">
                                        <thead>
                                            <tr>
                                                <th id="id_evento" scope="col">id</th>
                                                <th id="event_name" scope="col">Nome dell'evento</th>
                                                <th id="qtà_bigl" scope="col">Q.tà biglietti</th>
                                                <th id="totale" scope="col">Totale €</th>
                                                <th id="btn_remove" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th headers="code_event" scope="row">1</th>
                                                <td headers="event_name">Cremonini 2C2C</td>
                                                <td headers="qtà_bigl">1000</td>
                                                <td headers="totale">8000000000€</td>
                                                <td headers="btn_remove"><button class="btn btn-danger">Rimuovi</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
=======
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
                                    <form action="#" class="was-validated" novalidate method="post">
                                        <p>Seleziona il metodo di pagamento:</p>
                                            <input type="radio" name="pagamento" value="Paypal"> <i class="fa fa-cc-paypal"></i>  <input id="email_pp" type="email" name="pagamento" placeholder="Email" required></br>
                                            <input type="radio" name="pagamento" value="other cards"> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-amex"></i> <input id="n_carta" type="tel" name="pagamento" placeholder="Numero della carta" maxlength="16" required>
                                            <input type="number" name="pagamento" min="1" max="12"> <input type="number" name="pagamento" min="21" max="29"></br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="submit" class="btn btn-outline-secondary">Paga ora</button>  
>>>>>>> e63de68d9ee68ec41fffaea5c7422e4519e05237
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-secondary">Checkout</button>
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

<div id="events" class="container-fluid padding">
    <div class="row padding">
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Crea evento</h4>
                    <hr class="tab-event">
                    <!-- Modal -->
                    <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createEventModalTitle">Creazione Evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="was-validated" novalidate>
                                        <div class="form-group">
                                            <label for="catFormControlSelect1">Categoria</label>
                                            <select class="form-control" id="catFormControlSelect1" required>
                                            <?php foreach($templateParams["categorie"] as $categoria): ?> 
                                                <option><?php echo $categoria["category_name"];?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="titleFormControlInput1">Titolo</label>
                                            <input type="text" class="form-control" id="titleFormControlInput1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="locationFormControlInput2">Luogo</label>
                                            <input type="text" class="form-control" id="locationFormControlInput2" required>
                                            <!-- <div class="valid-feedback">
                                                OK!
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="dateFormControlInput3">Data e orario inizio</label>
                                            <input type="datetime-local" class="form-control" id="dateFormControlInput3" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="seatsFormControlInpu4">Posti disponibili</label>
                                            <input type="number" class="form-control" id="seatsFormControlInput4" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="priceFormControlInput5">Prezzo <i class="fa fa-euro"></i></label>
                                            <input type="number" class="form-control" id="priceFormControlInput5" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descrizFormControlTextarea1">Descrizione</label>
                                            <textarea class="form-control" id="descrizFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="submit" class="btn btn-outline-secondary">Crea evento</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <button id="btn-event" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createEventModal">Crea evento</button>
                </div>
            </div>
        </div>
        <?php $modifyEventModal=0;
            foreach($templateParams["eventi"] as $evento):
            $modifyEventModal++; ?>
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $evento["event_name"]; ?></h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th scope="row">Luogo</th>
                            <td id="nomeLuogo"><?php echo $evento["event_place"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Data</th>
                            <td id="dataEv"><?php echo $evento["event_date"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Posti disponibili</th>
                            <td id="numPosti"><?php echo $evento["ticket_available"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Prezzo</th>
                            <td id="costoBiglietto"><?php echo $evento["ticket_price"]; ?><i class="fa fa-euro"></i></td>
                        </tr>                        
                    </table>
                    <button id="btn-event" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#<?php echo $modifyEventModal; ?>">Modifica evento</button>
                    <div class="modal fade" id="<?php echo $modifyEventModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modifyEventModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyEventModalTitle">Modifica Evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="was-validated" novalidate>
                                        <div class="form-group">
                                            <label for="catModifFormControlSelect1">Categoria</label>
                                            <select class="form-control" id="catModifFormControlSelect1" required>
                                            <option selected disabled hidden>Scegli categoria</option>
                                            <?php foreach($templateParams["categorie"] as $categoria): ?> 
                                                <option><?php echo $categoria["category_name"];?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="titleModifFormControlInput1">Nome evento</label>
                                            <input type="text" class="form-control" id="titleModifFormControlInput1" value="<?php echo $evento["event_name"]; ?>" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="locationModifFormControlInput2">Luogo</label>
                                            <input type="text" class="form-control" id="locationModifFormControlInput2" value= "<?php echo $evento["event_place"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dateModifFormControlInput3">Data e orario inizio</label>
                                            <input type="datetime-local" class="form-control" id="dateModifFormControlInput3" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="locationModifFormControlInput4">Posti disponibili</label>
                                            <input type="number" class="form-control" id="locationModifFormControlInput4" value= "<?php echo $evento["ticket_available"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="priceModifFormControlInput5">Prezzo <i class="fa fa-euro"></i></label>
                                            <input type="number" class="form-control" id="priceModifFormControlInput5" value= "<?php echo $evento["ticket_price"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descrizFormControlTextarea1">Descrizione</label>
                                            <textarea class="form-control" id="descrizFormControlTextarea1" rows="3" required><?php echo $evento["descriptions"]; ?></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-success">Modifica evento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <?php endforeach ?> 
    </div>
    </div>
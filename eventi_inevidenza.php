<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Eventi in evidenza</li>
        </ol>
</nav>

<!-- Eventi -->
<div id="events" class="container-fluid padding">
    <div class="row padding">
    <?php
    $infomodal= 0;
    foreach($templateParams["inevidenza"] as $events):
        $infomodal++;
        ?>
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $events["event_name"]; ?></h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table" style="line-height: 1;">
                        <tr>
                            <th id="Luogo" scope="row">Luogo</th>
                            <td headers="Luogo" id="nomeLuogo" class="text-right"><?php echo $events["event_place"]; ?></td>
                        </tr>
                        <tr>
                            <th id="Data" scope="row">Data</th>
                            <td headers="Data" id="dataEv" class="text-right"><?php echo $events["event_date"]; ?></td>
                        </tr>
                        <tr>
                            <th id="Organizzatore" scope="row">Organizzatore</th>
                            <td headers="Organizzatore" id="nomeOrg" class="text-right"><?php echo $events["organizer_name"]; echo ' ';echo $events["organizer_surname"] ?></td>
                        </tr>
                        <tr>
                            <th id="Prezzo" scope="row">Prezzo</th>
                            <td headers="Prezzo" id="costoBiglietto" class="text-right"><?php echo $events["ticket_price"]; ?> <i class="fa fa-euro"></i></td>
                        </tr>
                    </table>

                    <?php



                    ?>

                    <form action="" method="post">
                        <input type="hidden" name="id_evento" value="<?php echo $events["event_id"];?>">
                        <input type="hidden" name="nome_evento" value="<?php echo $events["event_name"];?>">
                        <input type="hidden" name="prezzo_evento" value="<?php echo $events["ticket_price"];?>">
                        <input type="hidden" name="qtà_evento" value="1">
                        <button id="btn-event" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#cartModalLabel">Aggiungi al carrello</button>
                        <button id="btn-info" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#_<?php echo $infomodal;?>">Dettagli</button>
                    </form>
                    <div id="_<?php echo $infomodal;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel"><?php echo $events["event_name"]; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <?php echo $events["descriptions"]; ?>
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
    <?php endforeach; ?>
    </div>
</div>

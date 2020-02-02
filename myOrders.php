<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">I miei ordini</li>
        </ol>
</nav>
    <!--tabella con resoconto ordini-->
    <div id="titoloCat" class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-md-12">
                <hr class="orders">
                <h4 class="display-6">I miei ordini</h4>
                <hr class="orders">
            </div>
        </div>
    </div>
    <!-- a tabella con il riepilogo degli ordini -->
    <div id="div_table_riepilogo" class="table-responsive-sm">
        <table id="tableResume" class="table table-striped">
            <thead>
                <tr>
                    <th id="id_ordine" width="20%" scope="col">Numero Ordine</th>
                    <th id="data" width="20%" scope="col">Data Ordine</th>
                    <th id="totale" width="20%" scope="col">Totale <i class="fa fa-euro"></i></th>
                    <th id="dett" width="20%" scope="col">Dettagli</th>
                    <!-- <th id="mtd_pgmt" scope="col">Metodo di pagamento</th> -->
                </tr>
            </thead>
            <tbody>
              <?php $infomodal=0; ?>
              <?php foreach ($templateParams['details'] as $det):
                ?>

                <tr>
                    <td headers="id_ordine" scope="row"><?php echo $det['order_id'];?></th>
                    <td headers="data"><?php echo $det['purchase_date']; ?></td>
                    <td headers="totale"><?php echo $det['total_amounts']; ?>€</td>
                    <td headers="dett"><button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#__<?php echo $infomodal; ?>">Dettagli</button></td>
                    <!-- <td headers="mtd_pgmt">Carta</td> -->
                </tr>
                <?php $infomodal++; ?>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php $infomodal=0; ?>
  <?php foreach ($templateParams['details'] as $modal):
     ?>
    <div id="__<?php echo $infomodal; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="DetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DetailsModalLabel"><strong><?php echo "Dettagli ordine numero: ".$modal['order_id'].""; ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive-sm">
                 
                 <table id="dett" class="table table-striped">
                     <thead>
                         <tr>
                             <!-- <th id="" scope="col">id</th> -->
                             <th id="nome" width="20%" scope="col">Evento</th>
                             <th id="qtà" width="20%" scope="col">Quantità</th>
                             <th id="prezzo" width="20%" scope="col">Prezzo <i class="fa fa-euro"></i></th>
                             <!-- <th id="mtd_p" scope="col">Metodo di pagamento</th> -->
                         </tr>
                     </thead>
                     <tbody>
                       <?php $templateParams['details_modal'] = $dbh->rowsModal($modal['order_id']); ?>
                         <?php foreach ($templateParams['details_modal'] as $modals): ?>
                           <tr>
                               <td headers="nome"><?php echo $modals['event_name']; ?></td>
                               <td headers="qtà"><?php echo $modals['quantity']; ?></td>
                               <td headers="prezzo"><?php echo $modals['price']; ?></td>
                           </tr>
                         <?php endforeach; ?>
                     </tbody>

                  </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    <?php $infomodal++; ?>
<?php endforeach; ?>

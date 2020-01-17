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
    <?php foreach($templateParams["categorie"] as $categoria): ?>
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
                            <td id="nomeOrg"><?php echo $templateParams["nomeOrganizzatore"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Posti disponibili</th>
                            <td id="numPosti">100</td>
                        </tr>
                        <tr>
                            <th scope="row">Prezzo</th>
                            <td id="costoBiglietto"><?php echo $categoria["ticket_price"]; ?> <i class="fa fa-euro"></i></td>
                        </tr>                        
                    </table>
                    <button id="btn-event" type="button" class="btn btn-primary">Aggiungi al carrello</button>
                </div>
            </div>
        </div>
        <?php endforeach;?>  
    </div>
    </div>
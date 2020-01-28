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
                <div class="card-header">
                    <h4 class="card-title"><?php echo $categoria["event_name"]; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table-bordered">
                        <tr>
                            <th id="Luogo" scope="row">Luogo</th>
                            <td headers="Luogo" id="nomeLuogo" class="text-right"><?php echo $categoria["event_place"]; ?></td>
                        </tr>
                        <tr>
                            <th id="Data" scope="row">Data</th>
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
                    <form action="index_categoria.php?idcategoria=<?php echo $categoria["category_id"];?>">
                        <input type="hidden" name="id_evento" value="<?php echo $categoria["event_id"];?>">
                        <input type="hidden" name="nome_evento" value="<?php echo $categoria["event_name"];?>">
                        <input type="hidden" name="prezzo_evento" value="<?php echo $categoria["ticket_price"];?>">
                        <input type="hidden" name="qtà_evento" value="1">
                        <button id="btn-event" type="submit" name="aggiungi_al_carrello" class="btn btn-outline-secondary">Aggiungi al carrello</button>
                        <button id="btn-info" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#<?php echo $infomodal; ?>">Dettagli</button>
                    </form>
                    
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
        <?php endforeach; } ?>
    </div>
</div>
</div>
                    
                    <!--?php

                    require_once("bootstrap.php");

                    //controllo se Aggiungi al Carrello è stato cliccato
                    if(filter_input(INPUT_POST, 'aggiungi_al_carrello')){
                        if(isset($_SESSION['shopping_cart'])){
                            //tengo traccia di quanti prodotti sono nel carrello
                            $count = count($_SESSION['shopping_cart']);

                            //creo un array sequenziale per matchare le chiavi dell'array con l'id dei prodotti    
                            $product_ids = array_column($_SESSION['shopping_cart'], 'id');

                            //pre_r($product_ids);

                            if(!in_array(filter_input(INPUT_GET,'id'), $product_ids)){
                                $_SESSION['shopping_cart'][$count] = array
                                    (
                                        'id' => filter_input(INPUT_GET, 'id'),
                                        'name' => filter_input(INPUT_POST, 'name'),
                                        'price' => filter_input(INPUT_POST, 'price'),
                                        'quantity' => filter_input(INPUT_POST, 'quantity')
                                    )    
                            }
                            else{   //product already exist, increase quantity
                                //match array key to id of the product being added to the cart
                                //product already exists in shopping cart
                                for($i=0; $i < count($product_ids); $i++){
                                    if($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                                        $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                                    }
                                }
                            }
                        }
                        else{   //se il carrello non esiste, creo il primo prodotto con array key  0
                            //creo l'array usando submitted form data, inizia dal valore 0 e lo riempie con i valori    
                            $_SESSION['shopping_cart'][0] = array
                            (
                                'id' => filter_input(INPUT_GET, 'id'),
                                'name' => filter_input(INPUT_POST, 'name'),
                                'price' => filter_input(INPUT_POST, 'price'),
                                'quantity' => filter_input(INPUT_POST, 'quantity')                                
                            );
                        }
                    }

                    function pre_r($array){
                        echo '<pre>';
                        print_r($array);
                        echo '</pre';
                    }
                    
                    pre_r($_SESSION);
                    ?>

                   //roba da mettere in carrello x totale
                   if(!empty($_SESSION['shopping_cart'])){
                       $total = 0;

                       foreach($_SESSION['shopping_cart'] as $key => $product)
                   }


                    -->
                    
                    
                    <!-- <div id="cartModalLabel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cartModalLabelTitle" aria-hidden="true">
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
                            </div>
                        </div>
                    </div>
                    </div> -->
<?php require_once 'appunti_url.php';
      ?>

<nav class="navbar navbar-light navbar-expand sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" style="color: #d5d5d5" href="index.php">Unitickets</a>
    <div>
        <ul class="navbar-nav ml-auto">
            <li id="shop-nav" class="nav-item active">
                <a href="#" class="nav-link" style="color: #d5d5d5; margin-top: 10%" data-toggle="modal" data-target="#shoppingchartModalCenter"><i class="fa fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item">
                <a href="access/login.php?atype=cli"  style="color: #d5d5d5" class="nav-link">Accedi</a>
            </li>
            <li class="nav-item">
                <a href="access/register.php?atype=cli"  style="color: #d5d5d5" class="nav-link">Registrati</a>
            </li>
        </ul>
    </div>
</div>
</nav>

<div class="modal" id="shoppingchartModalCenter" tabindex="-1" role="dialog" aria-labelledby="shoppingchartModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Carrello</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                              <?php if(empty($_SESSION['shopping_cart'])){}
                                else { ?>
                                <!-- <th id="id_evento" scope="col">id</th> -->
                                <th id="event_name" scope="col">Evento</th>
                                <th id="quantità_bigl" scope="col">Q.tà</th>
                                <th id="totale" width="20%" scope="col">Prezzo €</th>
                                <th id="btn_remove" scope="col"></th>
                              <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            if(!empty($_SESSION['shopping_cart'])){
                                $total = 0;

                                foreach($_SESSION['shopping_cart'] as $key => $product):?>
                                <!-- <th headers="id_evento" scope="row">1</th> -->
                                <td headers="event_name"><?php echo($product['name']); ?></td>
                                <td headers="quantità_bigl"><?php echo($product['quantity']); ?></td>
                                <td headers="totale"><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                                <td headers="btn_remove">
                                  <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                  if($actual_link == $evid) { ?>
                                    <!-- <form action="cart.php?idcategoria=<?php //echo $_GET['idcategoria']; ?>" method="post"> -->
                                    <form action="cart_evidenza.php" method="post">
                                        <input type="hidden" name="remove_elem" value="1"></input>
                                        <input type="hidden" name="id_remove_element" value="<?php echo $product['id']; ?>"></input>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                  <?php } else if($actual_link == $home){ ?>
                                    <form action="cart_home.php" method="post">
                                        <input type="hidden" name="remove_elem" value="1"></input>
                                        <input type="hidden" name="id_remove_element" value="<?php echo $product['id']; ?>"></input>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                  <?php } else { ?>
                                    <form action="cart.php?idcategoria=<?php echo $_GET['idcategoria']; ?>" method="post">
                                        <input type="hidden" name="remove_elem" value="1"></input>
                                        <input type="hidden" name="id_remove_element" value="<?php echo $product['id']; ?>"></input>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                  <?php } ?>
                                </td>
                            </tr>
                            <?php

                            $total = $total + ($product['quantity'] * $product['price']);
                            endforeach;

                            ?>
                        </tbody>
                        <tfoot>
                            <th id="totale" colspan="2" class="text-center">Totale ordine</th>
                            <td headers="totale" colspan="2"><?php echo number_format($total, 2); ?> €</td>
                        </tfoot>
                        <?php }
                            else{?>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#checkout").hide();
                                });
                            </script>
                                <tbody>
                                    <tr>
                                        <td colspan="3" headers="event_name"><h4 class="text-center"><?php echo "Il carrello è vuoto"; ?></h4></td>

                                    </tr>
                                </tbody>
                    <?php   } ?>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <h5 class="text-center">Per poter effettuare ordini, esegui il <a href="access/login.php?atype=cli">Login</a>.</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <!-- <button type="button" id="checkout" class="btn btn-primary" data-toggle="modal" data-target="#cartModalLabel">Checkout</button> -->
                <script type="text/javascript">
                    $(document).ready(function(){
                      $("#checkout").click(function(){
                        $(".modal-backdrop").hide();
                        $("#shoppingchartModalCenter").hide();
                      });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

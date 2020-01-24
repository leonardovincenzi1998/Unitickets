<nav class="navbar navbar-light navbar-expand bg-light sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Unitickets</a>
    <div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="navbardrop" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbardrop">
                    <a href="#" class="dropdown-item">I miei dati</a>
                    <a href="#" class="dropdown-item">I miei ordini</a>
                    <a href="./access/logout.php" class="dropdown-item">Logout</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#shoppingchartModalCenter"><i class="fa fa-shopping-cart"></i></a>
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-secondary">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" id="navbardrop" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbardrop">
                    <p class="dropdown-item-text">Notifica</p>
                    <p class="dropdown-item-text">Notifica bella lunga per vedere se fa dropdown</p>
                    <p class="dropdown-item-text">Notifica</p>
                    <div class="dropdown-divider"></div>
                    <a href="./notifies.php" class="dropdown-item">Vedi tutte le notifiche</a>
                </div>
            </li>
        </ul>
    </div>
</div>
</nav>

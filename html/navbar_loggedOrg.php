<?php
$templateParams["notifica"] = $dbh->getNotifiesNavbarOrg($_SESSION["organizer_id"]);
?>
<!-- bg-dark -->
<nav class="navbar navbar-light navbar-expand sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" style="color: #d5d5d5" href="index_organizzatore.php">Unitickets</a>
    <div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="navbardrop" class="nav-link dropdown-toggle" style="color: #d5d5d5" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbardrop">
                    <a href="index_datiorg.php" class="dropdown-item">I miei dati</a>
                    <!-- <a href="#" class="dropdown-item">I miei ordini</a> -->
                    <a href="./access/logout.php" class="dropdown-item">Logout</a>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-shopping-cart"><span id="badge-num" class="badge badge-light" style="color: #3f3f3f;">5</span></i>
                </a>
            </li> -->
            <li class="nav-item dropdown">
                <a href="#" id="navbardrop" class="nav-link dropdown-toggle" style="color: #d5d5d5" data-toggle="dropdown"><i class="fa fa-bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbardrop">
                    <?php foreach($templateParams["notifica"] as $notifica): ?>
                    <p class="dropdown-item-text"><?php echo $notifica["description"] ?></p>
                    <hr>
                    <?php endforeach; ?>
                    <!-- <div class="dropdown-divider" ></div> -->
                    <a href="./index_notifiche_org.php" class="dropdown-item" style="color:blue">Vedi tutte le notifiche</a>
                    <!-- messo index per provare redirect -> funziona  -->
                </div>
            </li>
        </ul>
    </div>
</div>
</nav>

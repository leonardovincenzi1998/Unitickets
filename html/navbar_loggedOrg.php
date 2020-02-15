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
            <?php 
                $notificheviste = $dbh->checkNotifiesOrg($_SESSION['organizer_id']);
                if(empty($notificheviste)){
                   $num_notifiche=0;
                   ?>
                    <script>
                         $(document).ready(function(){
                         $("#badge").hide();
                         });
                    </script>
                    <?php
                } else {
                    
                    $num_notifiche= count($notificheviste);
                    if($num_notifiche > 3){ 
                        $num_notifiche="3+";
                    }
                }
                
            ?>
            <script>
                $(document).ready(function(){
                    $("#navbardrop1").click(function(event){
                        event.preventDefault();
                        console.log("script");
                        $("#badge").hide();
                    $.ajax({
                    url:"html/azzeraOrg.php",
                     success:function(){
                         console.log("funziona");
                     }
                    });
                });
            });
            </script>

            <li class="nav-item dropdown">
                <a href="#" id="navbardrop1" class="nav-link dropdown-toggle" style="color: #d5d5d5" data-toggle="dropdown"><i class="fa fa-bell" id="campnotifica"></i><span class="badge" id="badge"><?php echo $num_notifiche; ?></span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbardrop1">
                    <?php foreach($templateParams["notifica"] as $notifica): ?>
                    <p class="dropdown-item-text"><?php echo $notifica["description"] ?></p>
                    <hr>
                    <?php endforeach; ?>
                    <!-- <div class="dropdown-divider" ></div> -->
                    <a href="./index_notifiche_org.php" id="allNotifies" class="dropdown-item" style="color:blue">Vedi tutte le notifiche</a>
                    <!-- messo index per provare redirect -> funziona  -->
                </div>
            </li>
        </ul>
    </div>
</div>
</nav>

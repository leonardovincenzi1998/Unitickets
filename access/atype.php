<?php

if($_GET['atype']=="cli"){
  ?> <p class="text-center" id="downLoginForm">Non sei ancora registrato? <a href="register.php?atype=cli">Registrati!</a></br>
  Non sei un cliente? Accedi come <a href="?atype=org">organizzatore</a></p> <?php
}
else{
  ?> <p class="text-center" id="downLoginForm">Non sei ancora registrato? <a href="register.php?atype=org">Registrati!</a></br>
  Non sei un organizzatore? Accedi come <a href="?atype=cli">cliente</a></p> <?php
}
?>

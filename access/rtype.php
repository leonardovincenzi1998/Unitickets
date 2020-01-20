<?php

if($_GET['atype']=="cli"){
  ?> <p class="text-center" id="downRegForm">Sei già registrato? <a href="login.php?atype=cli">Accedi!</a></br>
Non sei un cliente? Registrati come <a href="?atype=org">organizzatore</a></p> <?php
}
else{
  ?><p class="text-center" id="downRegForm">Sei già registrato? <a href="login.php?atype=org">Accedi!</a></br>
Non sei un organizzatore? Registrati come <a href="?atype=cli">cliente</a></p><?php
}
 ?>

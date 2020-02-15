<?php
require_once("bootstrap.php");
require_once 'access/errore.php';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// var_dump($actual_link);
//require 'access/functions.php';

$templateParams["titolo"] = "Unitickets - Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["carosello"] = $dbh->getEventsInEvidence();


require("template/base.php");

if(isset($_SESSION['open_cart'])){
?>
<script type="text/javascript">
$(document).ready(function(){
  $("#shoppingchartModalCenter").modal('show');
});
</script>
<?php }
  // var_dump($_SESSION['open_cart']);
  if(isset($_SESSION['open_cart'])){
    unset($_SESSION['open_cart']);
  }

?>

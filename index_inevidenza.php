<?php
require_once("bootstrap.php");
require_once 'access/functions.php';
sec_session_start();

$templateParams["titolo"] = "Unitickets - Eventi in evidenza";
$templateParams["nome"] = "eventi_inevidenza.php";
$templateParams["inevidenza"]=$dbh->getInEvidenceInfo();


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

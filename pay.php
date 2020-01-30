<?php
require_once 'bootstrap.php';
require_once './access/functions.php';
sec_session_start();

var_dump($_SESSION);


?> <br><?php
// if(!isset($getmax)){
// var_dump($getmax);
// $getmax = 1;
// echo "ciao";
// }
// $prov = isset($getmax);
// var_dump($prov);

$totale = 0;
$price = 0;
$bool=0;
// $count = 0;
$user = $_SESSION['user_id'];
$date = date("Y-m-d");

foreach($_SESSION['shopping_cart'] as $key => $product):
  $totale = $totale + ($product['quantity'] * $product['price']);
  $info = $dbh->getEventInfo($product['id']);
  var_dump($info);
  var_dump($info[0]['ticket_available']);
  var_dump($totale);
  if($info[0]['ticket_available'] < $product['quantity']){
    $bool=1;
    // $descr_org = "Wow! Il tuo evento ".$product['name']." è sold out!";
    // echo "biglietti esauriti per l'evento ".$product['name']." !";
    // $dbh->NotifySoldOut($descr_org, $info[0]['organizer_id']);
    ?><script type="text/javascript">
      alert("I biglietti rimasti per l'evento <?php echo $product['name']; ?> sono: <?php echo $info[0]['ticket_available'];?>");
       window.location.href = "./index.php";
    </script><?php
    // header("location: index.php");
  }
endforeach;


if($bool==0){
  $dbh->insertOrder($user, $date, $totale);
  $getmax = $dbh->getOrderId();
  $descrizione = "Il tuo ordine numero:  ".$getmax." è stato confermato";  //serve per notifiche utente
  $dbh->OrderNotify($descrizione, $_SESSION['user_id']);    //mando notifica all'utente

  foreach($_SESSION['shopping_cart'] as $key => $product):
    // var_dump($product);
    $event = $product['id'];
    $quantity = $product['quantity'];
    $price = $price + ($product['quantity'] * $product['price']);
    // $totale = $totale + ($product['quantity'] * $product['price']);
    // $count++;
    $dbh->insertOrderDetails($getmax, $event, $quantity, $price);
    $dbh->Dec($quantity, $event);  //decremento il numero di ticket available
    $info = $dbh->getEventInfo($product['id']); //serve per notifiche org
    $price = 0;
    if($info[0]['ticket_available'] <= 0){
      $descr_org = "Wow! Il tuo evento ".$product['name']." è sold out!";
      $dbh->NotifySoldOut($descr_org, $info[0]['organizer_id']);
    };
    endforeach;

    unset($_SESSION['shopping_cart']);


  header("location: index.php?error=ord");
}

 ?>

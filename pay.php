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
// $count = 0;
$user = $_SESSION['user_id'];
$date = date("Y-m-d");

foreach($_SESSION['shopping_cart'] as $key => $product):
  $totale = $totale + ($product['quantity'] * $product['price']);
endforeach;

$dbh->insertOrder($user, $date, $totale);
$getmax = $dbh->getOrderId();

foreach($_SESSION['shopping_cart'] as $key => $product):
  // var_dump($product);
  $event = $product['id'];
  $quantity = $product['quantity'];
  $price = $price + ($product['quantity'] * $product['price']);
  // $totale = $totale + ($product['quantity'] * $product['price']);
  // $count++;
  $dbh->insertOrderDetails($getmax, $event, $quantity, $price);
  $dbh->Dec($quantity, $event);
  $descrizione = "Hai effettuato un ordine!";
  $dbh->OrderNotify($descrizione, $_SESSION['user_id']);
  $price = 0;
  endforeach;

unset($_SESSION['shopping_cart']);
//decrementa e manda notifiche utente

header("location: index.php?error=ord");


 ?>

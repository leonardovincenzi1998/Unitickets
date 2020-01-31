<?php
  require_once 'bootstrap.php';
  require_once './access/functions.php';
  $templateParams["categorie"] = $dbh->getEventsByCategoryId($_GET['idcategoria']);
  sec_session_start();

  // var_dump($_POST['aggiungi_al_carrello']);
  $pro = $_POST['aggiungi_al_carrello'];
  // var_dump($pro);
  // unset($GLOBALS['pro']);
  // var_dump($pro);
  // unset($_SESSION['shopping_cart']);
  if(isset($_POST['aggiungi_al_carrello'])){
     // unset($GLOBALS['pro']);
     // echo "var dump pro=";
     // var_dump($pro);
      if(isset($_SESSION['shopping_cart'])){
          //numero prodotti nel carrello
          $count = count($_SESSION['shopping_cart']);

          //array con solo id eventi nel carrello
          $product_ids = array_column($_SESSION['shopping_cart'], 'id');

          //pre_r($product_ids);

          if(!in_array($_POST['id_evento'], $product_ids)){
              $_SESSION['shopping_cart'][$count] = array
                (
                   'id' => $_POST['id_evento'],
                   'name' => $_POST['nome_evento'],
                   'price' => $_POST['prezzo_evento'],
                   'quantity' => $_POST['qtà_evento'],
                );
          }
          else{   //product already exist, increase quantity
              //match array key to id of the product being added to the cart
              //product already exists in shopping cart
              for($i=0; $i < count($product_ids); $i++){
                  if($product_ids[$i] == $_POST['id_evento']){
                      $_SESSION['shopping_cart'][$i]['quantity'] += $_POST['qtà_evento'];
                  }
              }
          }
      }
      else{   //se il carrello non esiste, creo il primo prodotto con array key  0
          //creo l'array usando submitted form data, inizia dal valore 0 e lo riempie con i valori
          $_SESSION['shopping_cart'][0] = array
          (
             'id' => $_POST['id_evento'],
             'name' => $_POST['nome_evento'],
             'price' => $_POST['prezzo_evento'],
             'quantity' => $_POST['qtà_evento'],
          );
      }
  }

  // function pre_r($array){
  //     echo '<pre>';
  //     print_r($array);
  //     echo '</pre';
  // }

  // pre_r($_SESSION);

// if(!empty($_SESSION['shopping_cart'])){
//   $total = 0;
// }
//REMOVE SOTTO
if(isset($_POST['remove_elem'])){
  $_SESSION['open_cart'] = 1;
  foreach ($_SESSION['shopping_cart'] as $key => $product) {
    if($product['id'] == $_POST['id_remove_element']){
      unset($_SESSION['shopping_cart'][$key]);
    }
  }
  $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
$cate = $_GET['idcategoria'];
header("location: index_categoria.php?idcategoria=".$cate."");

?>

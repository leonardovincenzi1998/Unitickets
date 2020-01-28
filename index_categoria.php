<?php
require_once("bootstrap.php");
require_once 'access/functions.php';
sec_session_start();                   //mi serve per vedere navbar giusta

// var_dump($_SESSION);  //per debug, mostra variabili di sessione istanziate al login
// if(isset($_POST['open_cart'])){
//

$templateParams["titolo"] = "Unitickets - Eventi";
$templateParams["nome"] = "categoria_singola.php";
$templateParams["nome_categoria"] = $dbh->getCategoryNameById($_GET['idcategoria']);
$templateParams["categorie"] = $dbh->getEventsByCategoryId($_GET['idcategoria']);
//$templateParams["evento"] = $dbh->getEventsById($_GET['idevent']);
//$templateParams["nomeOrganizzatore"] = $dbh->getOrganizerNameByEvents();
//var_dump($templateParams["categorie"]);

require_once("template/base.php");

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
// var_dump($_POST['aggiungi_al_carrello']);
// $pro = $_POST['aggiungi_al_carrello'];
// var_dump($pro);
// // unset($GLOBALS['pro']);
// // var_dump($pro);
// // unset($_SESSION['shopping_cart']);
// if(isset($_POST['aggiungi_al_carrello'])){
//    // unset($GLOBALS['pro']);
//    // echo "var dump pro=";
//    // var_dump($pro);
//     if(isset($_SESSION['shopping_cart'])){
//         //numero prodotti nel carrello
//         $count = count($_SESSION['shopping_cart']);
//
//         //array con solo id eventi nel carrello
//         $product_ids = array_column($_SESSION['shopping_cart'], 'id');
//
//         //pre_r($product_ids);
//
//         if(!in_array($_POST['id_evento'], $product_ids)){
//             $_SESSION['shopping_cart'][$count] = array
//               (
//                  'id' => $_POST['id_evento'],
//                  'name' => $_POST['nome_evento'],
//                  'price' => $_POST['prezzo_evento'],
//                  'quantity' => $_POST['qtà_evento'],
//               );
//         }
//         else{   //product already exist, increase quantity
//             //match array key to id of the product being added to the cart
//             //product already exists in shopping cart
//             for($i=0; $i < count($product_ids); $i++){
//                 if($product_ids[$i] == $_POST['id_evento']){
//                     $_SESSION['shopping_cart'][$i]['quantity'] += $_POST['qtà_evento'];
//                 }
//             }
//         }
//     }
//     else{   //se il carrello non esiste, creo il primo prodotto con array key  0
//         //creo l'array usando submitted form data, inizia dal valore 0 e lo riempie con i valori
//         $_SESSION['shopping_cart'][0] = array
//         (
//            'id' => $_POST['id_evento'],
//            'name' => $_POST['nome_evento'],
//            'price' => $_POST['prezzo_evento'],
//            'quantity' => $_POST['qtà_evento'],
//         );
//     }
// }
// $porc = $_POST['id_evento'];
// $odio = $_POST['nome_evento'];
// echo $porc."<br/>";
// echo $odio;
// $_SESSION['shopping_cart'][0] = array
//         (
//            'id' =>  $_POST['id_evento'],
//            'name' => $odio = $_POST['nome_evento'],
//            'price' => $_POST['prezzo_evento'],
//            'quantity' => $_POST['qtà_evento'],
//         );

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre';
}

pre_r($_SESSION);
?>

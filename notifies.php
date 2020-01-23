<?php
// require_once './access/db_connect.php';
// require_once 'bootstrap.php';
$templateParams['nome'] = "./bootstrap.php";
$templateParams["titolo"] = "Unitickets - Notifiche";
require_once './access/functions.php';
// require 'include_navbar.php';
sec_session_start(); //dovrebbe andare perchè in base ho include navbar che include functions.php
require_once './template/base.php';

$prova = $dbh->getAllNotifies(3);

var_dump($prova);
// //gli passo $_SESSION['user_id']
// public function getAllNotifies($id_utente){  //non lo chiamo user_id per paura di conflitti
//   $stmt = $this->db->prepare("SELECT * FROM notifies WHERE user_id=?")
//   $stmt->bind_param('i', $id_utente);
//   $stmt->execute();
//   $result = $stmt->get_result();
//
//   return $result->fetch_all(MYSQLI_ASSOC);
//
// }

 ?>

<!-- <p><?php echo($prova[0]['description']); ?></p> le
STAMPA AL CONTRARIO PERCHè LA FUNCTION STAMPA DALLA PIù RECENTE -->

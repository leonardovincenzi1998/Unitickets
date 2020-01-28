<?php
// require_once './access/db_connect.php';
// require_once 'bootstrap.php';
$templateParams['nome'] = "./bootstrap.php";
$templateParams["titolo"] = "Unitickets - Notifiche";
require_once './access/functions.php';
// require 'include_navbar.php';
sec_session_start(); //dovrebbe andare perchè in base ho include navbar che include functions.php
require_once './template/base.php';

$prova = $dbh->getNotifiesNavbar(3);

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


// public function admin_action(){
//
//  $stmt = $this->db->prepare("INSERT INTO notifies (description, notify_date,
//                      organizer_id) VALUES (?, ?, ?)");
//  $data = date("Y-m-d");
//  // $organizer_notify = FUNZIONE CHE TIRA FUORI ORG NAME DALLA CARTA EVENTO
//  $organizer_notify = getOrgId();
//  $stmt->bind_param('ssi', "il tuo evento è stato", $data, $organizer_notify);
//  $stmt->store_result();
//  $stmt->fetch();
//
//  return $result->fetch_all(MYSQLI_ASSOC);
//
// }
//
// public function getOrgId(){
//  $stmt = $this->db->prepare("SELECT organizer_id FROM events WHERE events_id = ?");
//
//    $stmt->bind_param('i', $evento["event_id"]);
//    $stmt->execute();
//    $stmt->store_result();
//    $stmt->bind_result($organizzatore);
//    $stmt->fetch();
//    return $organizzatore;
//
// }
<<<<<<< HEAD
// ?>
=======
?>
>>>>>>> feff80cdd5b6164e08f5344c70a8adb2af5de8f3

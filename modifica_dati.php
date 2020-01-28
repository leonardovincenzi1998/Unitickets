<?php
// include 'register_functions.php';
require_once 'access/functions.php';
require_once("bootstrap.php");
sec_session_start();

$templateParams["modifica"]= $dbh->ModifyDati($_POST['email'], $_POST['tel'], $_SESSION['user_id']);
// header("location: index.php?error=mod"); c'è già nella funzione!


/*$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PWD = '';
$DB_NAME = 'unitickets';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

    $stmt = $conn->prepare('UPDATE user SET user_email=?, user_tel=? WHERE user_id=?');
    $stmt->bind_param('sii', $_POST['email'], $_POST['tel'], $_SESSION['user_id']);
    $stmt->execute();
    $stmt->store_result();



     $conn->close();*/
?>

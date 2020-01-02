<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PWD = '';
$DB_NAME = 'ticket';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
  // Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['password'], $_POST['email'])) {
  	// Could not get the data that should have been sent.
  die ('Please complete the registration form!');
}
  // Make sure the submitted registration values are not empty.
if (empty($_POST['password']) || empty($_POST['email'])) {
  	// One or more values are empty.
  die ('Please complete the registration form');

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!');
}
if (!filter_var($_POST['birthdate'], FILTER_VALIDATE_DATE)) {
	die ('Data di nascita non valida!');
}
if (strlen($_POST['password']) > 16 || strlen($_POST['password']) < 8) {
	die ('Scegli una password compresa tra 8 e 16 caratteri');
}

if ($stmt = $conn->prepare('SELECT * FROM accounts WHERE email = ?')) {

  $stmt->bind_param('s', $_POST['email']);
  $stmt->execute();
  $stmt->store_result();
  // Store the result so we can check if the account exists in the database.
  if ($stmt->num_rows > 0) {
  	// Email already exists
  	echo 'Email exists, please choose another!';     //potrei fare un alert(di js)
  }
  else {
    // Username doesnt exists, insert new account
    if ($stmt = $conn->prepare('INSERT INTO accounts (name, surname, email, password, birthdate) VALUES (?, ?, ?, ?, ?)')) {
    	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
    	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    	$stmt->bind_param('sssss', $_POST['name'], $_POST['surname'], $_POST['email'], $password, $_POST['birthdate']);
    	$stmt->execute();
    	echo 'You have successfully registered, you can now login!';
    }
  }
	$stmt->close(); //else
}
//else
$conn->close();
?>

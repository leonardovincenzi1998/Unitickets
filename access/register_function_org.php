<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PWD = '';
$DB_NAME = 'unitickets';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

if (!empty($_POST['p']) && !empty($_POST['email']) && !empty($_POST['name']) &&
     !empty($_POST['surname']) && !empty($_POST['iva']) && !empty($_POST['tel']) ) {
  if ($stmt = $conn->prepare('SELECT * FROM organizer WHERE organizer_email = ?')) {

    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
    	// Email already exists
    	// echo 'Email exists, please choose another!';
      header("location: ./register.php?atype=org&error=reg1");     //redirect
    }
    else {
      //Email doesnt exists, insert new account
      if ($stmt = $conn->prepare('INSERT INTO organizer (organizer_name, organizer_surname, organizer_email, organizer_password,
          organizer_salt, organizer_iva, organizer_tel) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
  			// Recupero la password criptata dal form di inserimento.
  			$password = $_POST['p'];
  			// Crea una chiave casuale
  			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
  			// Crea una password usando la chiave appena creata.
  			$password = hash('sha512', $password.$random_salt);

      	$stmt->bind_param('sssssss', $_POST['name'], $_POST['surname'], $_POST['email'],
  			 									$password, $random_salt, $_POST['iva'], $_POST['tel']);
      	$stmt->execute();
      	// echo 'You have successfully registered, you can now login!';
        header("location: ./login.php?atype=org&error=regok");
      }
    }
  	// $stmt->close(); //else
}} else {
  header("location: ./register.php?atype=org&error=reg");
}
  //else

  $conn->close();

?>

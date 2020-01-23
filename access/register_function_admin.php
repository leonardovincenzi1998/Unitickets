<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<?php
// include 'register_functions.php';

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PWD = '';
$DB_NAME = 'unitickets';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
// if (mysqli_connect_errno()) {
// 	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
//   // Now we check if the data was submitted, isset() function will check if the data exists.
// if (!isset($_POST['password'], $_POST['email'])) {
//   	// Could not get the data that should have been sent.
//   die ('Please complete the registration form!');
// }
//   // Make sure the submitted registration values are not empty.
// if (empty($_POST['password']) || empty($_POST['email'])) {
//   	// One or more values are empty.
//   die ('Please complete the registration form');
//
// if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
// 	die ('Email is not valid!');
// }
// if (!filter_var($_POST['birthdate'], FILTER_VALIDATE_DATE)) {
// 	die ('Data di nascita non valida!');
// }
// if (strlen($_POST['password']) > 16 || strlen($_POST['password']) < 8) {
// 	die ('Scegli una password compresa tra 8 e 16 caratteri');
// }
//OCCHIO CHE I NAME DEI PARAMETRI IN POST SONO DIVERSI DAI CAMPI DEL DB !!!
// if (isset($_POST['email'], $_POST['p'], $_POST['name'], $_POST['surname'],
//     $_POST['birthdate'], $_POST['tel'] )) {
if (!empty($_POST['p']) && !empty($_POST['email'])) {
  if ($stmt = $conn->prepare('SELECT * FROM admin WHERE admin_email = ?')) {

    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
    	// Email already exists
    	// echo 'Email exists, please choose another!';
      header("location: ./register_admin.php?error=reg1");
    }
    else {
      //Email doesnt exists, insert new account
      if ($stmt = $conn->prepare('INSERT INTO admin (admin_email, admin_password,
          admin_salt) VALUES (?, ?, ?)')) {
  			// Recupero la password criptata dal form di inserimento.
  			$password = $_POST['p'];
  			// Crea una chiave casuale
  			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
  			// Crea una password usando la chiave appena creata.
  			$password = hash('sha512', $password.$random_salt);

      	$stmt->bind_param('sss', $_POST['email'],
  			 									$password, $random_salt);
      	$stmt->execute();
      	// echo 'You have successfully registered, you can now login!';
        header("location: ./login_admin.php?error=regok");
      }
    }
  	// $stmt->close(); //else
}} else {
  header("location: ./register_admin.php?error=reg");
}
  //else

  $conn->close();

?>

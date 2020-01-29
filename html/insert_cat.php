<?php
//insert.php
require_once '../access/functions.php';
sec_session_start();
$connect = mysqli_connect("localhost", "root", "", "unitickets");
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $description = mysqli_real_escape_string($connect, $_POST["desc"]);
    $img = mysqli_real_escape_string($connect, $_POST['img']);
    $query = "
    INSERT INTO category(category_name, image_url, description)  
     VALUES('$name', '$img', '$description')
    ";
    
    if(mysqli_query($connect, $query))
    {
     alert("ok");
    } else{
     alert("ok");
    }
}
alert("ok");


     

?>

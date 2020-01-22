<?php
//update.php  
require_once 'access/functions.php';
sec_session_start();
$connect = mysqli_connect("localhost", "root", "", "unitickets");
if(!empty($_POST))
{
     /*$category = mysqli_real_escape_string($connect, $_POST["cat2"]);
     $stmt=mysqli_stmt_init($connect);
     if(mysqli_stmt_prepare($stmt,"SELECT category_id FROM category WHERE category_name=?")){
          mysqli_stmt_bind_param($stmt,"s",$category);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_bind_result($stmt,$category2);
          mysqli_stmt_fetch($stmt);
          mysqli_stmt_close($stmt);
     }*/
     /*$stmt = $this->db->prepare("SELECT category_id FROM category WHERE category_name=?");
        $stmt->bind_param('i',$category);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id_categoria);
        $stmt->fetch();
       $category = $id_categoria; */
    $id = mysqli_real_escape_string($connect, $_POST["id1"]);  
    $name = mysqli_real_escape_string($connect, $_POST["name2"]);  
    $place = mysqli_real_escape_string($connect, $_POST["place2"]);  
    $data = mysqli_real_escape_string($connect, $_POST["data2"]);  
    $seats = mysqli_real_escape_string($connect, $_POST["seats2"]);
    $price = mysqli_real_escape_string($connect, $_POST["price2"]);
    $description = mysqli_real_escape_string($connect, $_POST["desc2"]);
    // $organizer = mysqli_real_escape_string($connect, $_SESSION['organizer_id']);
    $query = "
    UPDATE events
    SET event_name='$name', event_date='$data', event_place='$place', ticket_price='$price', descriptions='$description', total_ticket='$seats' 
    WHERE event_id=$id
    ";
    if(mysqli_query($connect, $query))
    {
     alert("Cazzo si");
    } else{
     alert("merda no");
    }
}
alert("Sono fottuto");
?>
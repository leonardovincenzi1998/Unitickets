<?php
//insert.php  
$connect = mysqli_connect("localhost", "root", "", "unitickets");
if(!empty($_POST))
{
     $category = mysqli_real_escape_string($connect, $_POST["cat"]);
     $stmt=mysqli_stmt_init($connect);
     if(mysqli_stmt_prepare($stmt,"SELECT category_id FROM category WHERE category_name=?")){
          mysqli_stmt_bind_param($stmt,"s",$category);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_bind_result($stmt,$category2);
          mysqli_stmt_fetch($stmt);
          mysqli_stmt_close($stmt);
     }
     /*$stmt = $this->db->prepare("SELECT category_id FROM category WHERE category_name=?");
        $stmt->bind_param('i',$category);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id_categoria);
        $stmt->fetch();
       $category = $id_categoria; */
    $name = mysqli_real_escape_string($connect, $_POST["name"]);  
    $place = mysqli_real_escape_string($connect, $_POST["place"]);  
    $data = mysqli_real_escape_string($connect, $_POST["data"]);  
    $seats = mysqli_real_escape_string($connect, $_POST["seats"]);
    $price = mysqli_real_escape_string($connect, $_POST["price"]);
    $description = mysqli_real_escape_string($connect, $_POST["desc"]);
    $organizer = mysqli_real_escape_string($connect, $_GET['idorganizer']);
    $query = "
    INSERT INTO events(event_name, event_date, event_place, ticket_price, organizer_id, category, in_evidence, img, descriptions, Stato, ticket_available)  
     VALUES('$name', '$data', '$place', '$price', '1', '$category2', '0', '', '$description', '0', '$seats')
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
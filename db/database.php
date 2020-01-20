<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }
    
    //funzione per ottenere tutte le categorie
    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * FROM category");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEvents(){
        $stmt = $this->db->prepare("SELECT * FROM events WHERE in_evidence=1");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventsInEvidence(){
        $output='';
        $count=0;
        $stmt = $this->db->prepare("SELECT * FROM events WHERE in_evidence=1");
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = mysqli_fetch_array($result)) {
            if($count == 0) {
                $output .= '<div class="carousel-item active">
                <img src="'.$row["img"].'" alt="'.$row["event_name"].'" class="d-block w-100">
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all evento</button>
                </div>
            </div>
            ';
            }
            else {
            $output .= '<div class="carousel-item">
                <img src="'.$row["img"].'" alt="'.$row["event_name"].'" class="d-block w-100">
                    <div class="carousel-caption">
                        <button type="button" class="btn btn-primary btn-lg">Vai all evento</button>
                    </div>
                </div>
                ';
            }
            $count = $count + 1;
        }
        return $output;
    }

    //funzione per ottenere gli eventi in base all'id della categoria
    public function getEventsByCategoryId($idcategory){
        $stmt = $this->db->prepare("SELECT * FROM events,category,organizer WHERE category.category_id = events.category AND events.organizer_id = organizer.organizer_id AND events.category=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        //var_dump($result->fetch_all(MYSQLI_ASSOC));

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*public function getOrganizerNameByEvents($idevent){
        $stmt = $this->db->prepare("SELECT organizer_name, organizer_surname FROM events,organizer WHERE organizer.organizer_id=events.organizer_id AND events.event_id=?");
        $stmt->bind_param('i',$idevent);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($nome, $cognome);
        $stmt->fetch();
        $nome_intero= $nome.' '.$cognome;
        return $nome_intero;
    }*/

    public function getCategoryNameById($idcategory){
        $stmt = $this->db->prepare("SELECT category_name FROM category WHERE category_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($nome_categoria);
        $stmt->fetch();
        return $nome_categoria;

        /*$result = $stmt->get_result();
        $output='';

        while($row = mysqli_fetch_array($result)) {
            $output .= '
                <li class="breadcrumb-item active" aria-current="page">Categoria:'.$row["category_name"].'</li>
            ';
        }
        return $output;*/
    }

    /*public function getEventsById($idevent){
        $stmt = $this->db->prepare("SELECT event_name FROM events WHERE event_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($event_name);
        $stmt->fetch();
        return $event_name;
    }*/


    //funzione per ottenere l'immagine della categoria in base all'id di questa sul db
    /*public function getImgCategoriesById($idcategory){
        $stmt = $this->db->prepare("SELECT image_url FROM category WHERE category_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
*/
}

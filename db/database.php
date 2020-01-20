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

    public function getCategoryNameById($idcategory){
        $stmt = $this->db->prepare("SELECT category_name FROM category WHERE category_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($nome_categoria);
        $stmt->fetch();
        return $nome_categoria;

    }

    public function getEventsByIdOrganizer($idorganizer){
        $stmt = $this->db->prepare("SELECT * FROM events WHERE organizer_id=?");
        $stmt->bind_param('i',$idorganizer);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
}

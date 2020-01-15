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
        $stmt = $this->db->prepare("SELECT * FROM events");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function n_inEvidence(){
        $stmt = $this->db->prepare("SELECT * FROM events ");
        $stmt->execute();
        $result = $stmt->get_result();

        return (count($result->fetch_all(MYSQLI_ASSOC)) -1);
    }

    public function getEventsInEvidence(){
        $output='';
        $count=0;
        $stmt = $this->db->prepare("SELECT * FROM events ");
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = mysqli_fetch_array($result)) {
            if($count == 0) {
                $output .= '
                <div class="carousel-item active">
                <img src='.$row["img"].' alt='.$row["event_name"].'>
                <div class="carousel-caption">
                    <button type="button" class="btn btn-primary btn-lg">Vai all evento</button>
                </div>
            </div>
                ';
            }
            else {
            $output .= '
                <div class="carousel-item">
                <img src='.$row["img"].' alt='.$row["event_name"].'>
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

 /*   //funzione per ottenere la categoria in base all'id di questa sul db
    public function getCategoryById($idcategory){
        $stmt = $this->db->prepare("SELECT category_name FROM category WHERE category_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //funzione per ottenere l'immagine della categoria in base all'id di questa sul db
    public function getImgCategoriesById($idcategory){
        $stmt = $this->db->prepare("SELECT image_url FROM category WHERE category_id=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
*/
}

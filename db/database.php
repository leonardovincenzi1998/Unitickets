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
    //funzione per ottenere la categoria in base all'id di questa sul db
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

    

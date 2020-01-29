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
                    <button type="submit" class="btn btn-primary btn-md">Eventi in evidenza</button>
                </div>
            </div>
            ';
            }
            else {
                $output .= '<div class="carousel-item">
                <img src="'.$row["img"].'" alt="'.$row["event_name"].'" class="d-block w-100">
                <div class="carousel-caption">
                    <button type="submit" class="btn btn-primary btn-md">Eventi in evidenza</button>
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
        $inapprovazione="In approvazione";
        $rifiutato="Rifiutato";
        $inevidenza="In evidenza";
        $stmt = $this->db->prepare("SELECT * FROM events,category,organizer WHERE category.category_id = events.category AND events.organizer_id = organizer.organizer_id AND events.category=? AND NOT events.Stato=? AND NOT events.Stato=?");
        $stmt->bind_param('iss',$idcategory,$inapprovazione,$rifiutato);
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
        $stmt = $this->db->prepare("SELECT * FROM events,category WHERE events.category=category.category_id AND organizer_id=? ORDER BY event_id DESC");
        $stmt->bind_param('i',$idorganizer);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

                                //gli passo $_SESSION['user_id']
    public function getAllNotifies($id_utente){  //non lo chiamo user_id per paura di conflitti
       $stmt = $this->db->prepare("SELECT * FROM notifies WHERE user_id=?
                                  ORDER BY notifies_id DESC");
       $stmt->bind_param('i', $id_utente);
       $stmt->execute();
       $result = $stmt->get_result();

       return $result->fetch_all(MYSQLI_ASSOC);

     }

     public function getNotifiesNavbar($id_utente){  //non lo chiamo user_id per paura di conflitti
        $stmt = $this->db->prepare("SELECT * FROM notifies WHERE user_id=?
                                    ORDER BY notifies_id DESC LIMIT 3");
        $stmt->bind_param('i', $id_utente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

      }

      public function getNotifiesNavbarOrg($organizer_id){  //non lo chiamo user_id per paura di conflitti
         $stmt = $this->db->prepare("SELECT * FROM notifies_org WHERE organizer_id=?
                                    ORDER BY notifies_id DESC LIMIT 3");
         $stmt->bind_param('i', $organizer_id);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC);

       }

       public function getAllOrgNotifies($organizer_id){  //non lo chiamo user_id per paura di conflitti
          $stmt = $this->db->prepare("SELECT * FROM notifies_org WHERE organizer_id=?
                                     ORDER BY notifies_id DESC");
          $stmt->bind_param('i', $organizer_id);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);

        }

        public function getInEvidenceInfo(){
            $stmt = $this->db->prepare("SELECT * FROM events,category,organizer WHERE category.category_id = events.category
                                        AND events.organizer_id = organizer.organizer_id AND in_evidence=1");
            $stmt->execute();
            $result = $stmt->get_result();
            //var_dump($result->fetch_all(MYSQLI_ASSOC));

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getUserInfo($id_utente){
            $stmt = $this->db->prepare("SELECT name,surname,user_email,user_tel,birthdate FROM user WHERE user_id=?");
            $stmt->bind_param('i',$id_utente);
            $stmt->execute();
            $result = $stmt->get_result();
            //var_dump($result->fetch_all(MYSQLI_ASSOC));

            return $result->fetch_all(MYSQLI_ASSOC);

        }

        public function getOrganizerInfo($id_organizzatore){
            $stmt = $this->db->prepare("SELECT organizer_name,organizer_surname,organizer_email,organizer_tel,organizer_iva FROM organizer WHERE organizer_id=?");
            $stmt->bind_param('i',$id_organizzatore);
            $stmt->execute();
            $result = $stmt->get_result();
            //var_dump($result->fetch_all(MYSQLI_ASSOC));

            return $result->fetch_all(MYSQLI_ASSOC);

        }

        public function getAdminEvents(){
            $parametro="In approvazione";
            $stmt = $this->db->prepare("SELECT * FROM events,category,organizer WHERE category.category_id = events.category
                                        AND events.organizer_id = organizer.organizer_id AND events.Stato=?");
            $stmt->bind_param('s',$parametro);
            $stmt->execute();
            $result = $stmt->get_result();
            //var_dump($result->fetch_all(MYSQLI_ASSOC));

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function ModifyDati($email,$telefono,$user){
            $stmt = $this->db->prepare('UPDATE user SET user_email=?, user_tel=? WHERE user_id=?');
            $stmt->bind_param('sii', $email, $telefono, $user);
            $stmt->execute();
            $stmt->store_result();

            header("location: ./index.php?error=mod");
        }

        public function ModifyDatiOrg($email,$telefono,$organizer){
            $stmt = $this->db->prepare('UPDATE organizer SET organizer_email=?, organizer_tel=? WHERE organizer_id=?');
            $stmt->bind_param('sii', $email, $telefono, $organizer);
            $stmt->execute();
            $stmt->store_result();

            header("location: ./index_organizzatore.php?atype=cli&error=mod1");
        }

        public function ModifyEvents($id,$name,$place,$data,$seats,$price,$desc){
            $stmt=$this->db->prepare('UPDATE events SET event_name=?, event_date=?, event_place=?, ticket_price=?, descriptions=?, total_ticket=? WHERE event_id=?');
            $stmt->bind_param('sssisii',$name,$data,$place,$price,$desc,$seats,$id);
            $stmt->execute();
            $stmt->store_result();

            header("location: ./index_organizzatore.php?atype=cli&error=upd");
        }

        public function AdminApproved($stato,$in_evidenza,$idevento){

            $stmt = $this->db->prepare('UPDATE events SET Stato=?, in_evidence=? WHERE event_id=?');
            $stmt->bind_param('sii', $stato, $in_evidenza, $idevento);
            $stmt->execute();
            $stmt->store_result();

            //header("location: html/admin.php");
        }

        public function EventIdToName($idevento){
            $stmt=$this->db->prepare('SELECT event_name FROM events WHERE event_id=?');
            $stmt->bind_param('i', $idevento);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($nome_evento);
            $stmt->fetch();
            return $nome_evento;
        }

        public function Admin_Action($descrizione,$idorganizzatore){
            $stmt = $this->db->prepare("INSERT INTO notifies_org (description, notify_date,
                                organizer_id) VALUES (?, ?, ?)");
            $data = date("Y-m-d");

            $stmt->bind_param('ssi',$descrizione, $data, $idorganizzatore);
            $stmt->execute();
            $stmt->store_result();
            header("location: html/admin.php");

           }

        // ERA UN ESEMPIO PER PROVARE STRINGHE
        // public function getAllNotifies($id_utente){  //non lo chiamo user_id per paura di conflitti
        //    $stmt = $this->db->prepare("SELECT * FROM notifies WHERE description=?");
        //    $stmt->bind_param('s', $id_utente);
        //    $stmt->execute();
        //    $result = $stmt->get_result();
        //
        //    return $result->fetch_all(MYSQLI_ASSOC);
        //
        //  }

        public function insertOrder($user, $date, $totale){
             $stmt = $this->db->prepare("INSERT INTO orders(user_id,
                       purchase_date, total_amounts) VALUES (?, ?, ?)");
             // $user = $_SESSION['user_id'];
             // $event = $_SESSION['shopping_cart']['id'];
             // $quantity = $_SESSION['shopping_cart']['quantity'];
             // $date = date("Y-m-d");
             // $totale = 0;
             // foreach($_SESSION['shopping_cart'] as $key => $product):
             //   $totale = $totale + ($product['quantity'] * $product['price']);
             //   endforeach;
             $stmt->bind_param('isi', $user, $date, $totale);
             $stmt->execute();
             $stmt->store_result();

           }

           public function insertOrderDetails($orderid, $event, $quantity, $price){
             $stmt = $this->db->prepare("INSERT INTO order_details(order_id, event_id, quantity,
                       price) VALUES (?, ?, ?, ?)");
             $stmt->bind_param('iiii', $orderid, $event, $quantity, $price);
             $stmt->execute();
             $stmt->store_result();

           }

           public function getOrderId(){
             $stmt = $this->db->prepare("SELECT MAX(order_id) FROM orders");
             $stmt->execute();
             $stmt->store_result();
             $stmt->bind_result($orderid);
             // $orderid = $orderid + 1;
             $stmt->fetch();
             return $orderid;
           }
           // public function insertOrderDetails($event, $quantity, $date, $price){
           //   $stmt = $this->db->prepare("INSERT INTO order_details(event_id, quantity,
           //             purchase_date, total_amounts) VALUES (?, ?, ?, ?, ?)");
           //   // $user = $_SESSION['user_id'];
           //   // $event = $_SESSION['shopping_cart']['id'];
           //   // $quantity = $_SESSION['shopping_cart']['quantity'];
           //   // $date = date("Y-m-d");
           //   // $totale = 0;
           //   // foreach($_SESSION['shopping_cart'] as $key => $product):
           //   //   $totale = $totale + ($product['quantity'] * $product['price']);
           //   //   endforeach;
           //   $stmt->bind_param('iisi', $event, $quantity, $date, $price);
           //   $stmt->execute();
           //   $stmt->store_result();
           //
           // }
           public function OrderNotify($descrizione, $userid){
               $stmt = $this->db->prepare("INSERT INTO notifies (description, notify_date,
                                   user_id) VALUES (?, ?, ?)");
               $data = date("Y-m-d");
               $stmt->bind_param('ssi',$descrizione, $data, $userid);
               $stmt->execute();
               $stmt->store_result();

              }

              public function getMyOrders($user){
                $stmt = $this->db->prepare("SELECT * FROM orders, order_details WHERE
                        orders.order_id = order_details.order_id AND orders.user_id = ?");
                $stmt->bind_param('i', $user);
                $stmt->execute();
                $result = $stmt->get_result(MYSQLI_ASSOC);

                return $result;
              }

              public function Dec($quantity, $evento){
                $stmt = $this->db->prepare("UPDATE events SET events.ticket_available=(ticket_available - ?)
                                            WHERE event_id=?");
                $stmt->bind_param('ii', $quantity, $evento);
                $stmt->execute();
                $stmt->store_result();

              }

              public function getTotal($user){
                $stmt = $this->db->prepare("SELECT * FROM orders WHERE user_id = ?");
                $stmt->bind_param('i', $user);
                $stmt->execute();
                $result = $stmt->get_result(MYSQLI_ASSOC);

                return $result;
              }

}

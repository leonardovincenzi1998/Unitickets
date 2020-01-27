<div id="events" class="container-fluid padding">
    <div class="row padding">
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Crea evento</h4>
                    <hr class="tab-event">
                    <!-- Modal -->
                    <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="createEventModalTitle">Creazione Evento</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="was-validated" novalidate method="post" id="insert_form">
                                        <div class="form-group">
                                            <label for="cat">Categoria</label>
                                            <select class="form-control" name="cat" id="cat" required>
                                            <?php foreach($templateParams["categorie"] as $categoria): ?>
                                                <option><?php echo $categoria["category_name"];?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Titolo</label>
                                            <input type="text" class="form-control" name="name" id="name" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="place">Luogo</label>
                                            <input type="text" class="form-control" name="place" id="place" required>
                                            <!-- <div class="valid-feedback">
                                                OK!
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="data">Data</label>
                                            <input type="datetime-local" class="form-control" name="data" id="data" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="seats">Posti disponibili</label>
                                            <input type="number" class="form-control" name="seats" id="seats" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Prezzo <i class="fa fa-euro"></i></label>
                                            <input type="number" step="0.01" class="form-control" name="price" id="price" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Descrizione</label>
                                            <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Immagine</label>
                                            <input type="text" class="form-control" name="img" id="img">
                                        </div>
                                        <input type="submit" name="insert" id="insert" value="Crea evento" class="btn btn-success" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fine modale creazione evento -->
                    <button id="btn-event" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createEventModal" >Crea evento</button>
                </div>
            </div>
        </div>
        <?php $modifyEventModal=0;
            foreach($templateParams["eventi"] as $evento):
            $modifyEventModal++; ?>
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $evento["event_name"]; ?></h4>
                    <hr class="tab-event">
                    <table class="table-borderless-responsive">
                        <tr>
                            <th scope="row">Categoria</th>
                            <td id="Categoria"><?php echo $evento["category_name"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Luogo</th>
                            <td id="nomeLuogo"><?php echo $evento["event_place"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Data</th>
                            <td id="dataEv"><?php echo $evento["event_date"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Biglietti rimasti</th>
                            <td id="numPosti"><?php echo $evento["ticket_available"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Prezzo</th>
                            <td id="costoBiglietto"><?php echo $evento["ticket_price"]; ?><i class="fa fa-euro"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Descrizione</th>
                            <td id="descrizione"><?php echo $evento["descriptions"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Stato</th>
                            <td id="Stato"><?php echo $evento["Stato"]; ?></td>
                        </tr>
                    </table>
                    <button id="btn-event" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#updateevent">Modifica evento</button>
                    <div class="modal fade" id="updateevent" tabindex="-1" role="dialog" aria-labelledby="modifyEventModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyEventModalTitle">Modifica Evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
<<<<<<< HEAD
                                    
                                        
                                            <label for="id1" hidden>Id</label>
                                            <input type="number" class="form-control" id="id1" value="<?php echo $evento["event_id"]; ?>" hidden>
                                            
                                        
=======
                                    <form class="was-validated" novalidate method="post" id="modify-form" >

                                            <label for="id1" hidden>Id</label>
                                            <input type="number" class="form-control" id="id1" value="<//?php echo $evento["event_id"]; ?>" hidden>


>>>>>>> feff80cdd5b6164e08f5344c70a8adb2af5de8f3
                                        <div class="form-group">
                                            <label for="cat2">Categoria</label>
                                            <select class="form-control" id="cat2" required>
                                            <option selected disabled>Non è possibile modificare la categoria dell'evento</option>
<<<<<<< HEAD
                                            <?php foreach($templateParams["categorie"] as $categoria): ?> 
                                                <option disabled><?php echo $categoria["category_name"];?></option>
                                            <?php endforeach; ?>
=======
                                            <//?php foreach($templateParams["categorie"] as $categoria): ?>
                                                <option disabled><//?php echo $categoria["category_name"];?></option>
                                            <//?php endforeach; ?>
>>>>>>> feff80cdd5b6164e08f5344c70a8adb2af5de8f3
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name2">Nome evento</label>
<<<<<<< HEAD
                                            <input type="text" class="form-control" id="name2" value="<?php echo $evento["event_name"]?>"  required />
                                            
=======
                                            <input type="text" class="form-control" id="name2"  required />

>>>>>>> feff80cdd5b6164e08f5344c70a8adb2af5de8f3
                                        </div>
                                        <div class="form-group">
                                            <label for="place2">Luogo</label>
                                            <input type="text" class="form-control" id="place2" value="<?php echo $evento["event_place"]?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="data2">Data e orario inizio</label>
                                            <input type="datetime-local" class="form-control" id="data2" value="<?php echo $evento["event_date"]?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="seats2">Posti disponibili</label>
                                            <input type="number" class="form-control" id="seats2" value="<?php echo $evento["ticket_available"]?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="price2">Prezzo <i class="fa fa-euro"></i></label>
                                            <input type="number" class="form-control" id="price2" value="<?php echo $evento["ticket_price"]?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="desc2">Descrizione</label>
                                            <textarea class="form-control" id="desc2" rows="3" <?php echo $evento["descriptions"]?> required><?php echo $evento["descriptions"]?></textarea>
                                        </div>
                                        <form class="was-validated" novalidate method="post" id="modify-form" >
                                        <input type="submit" name="modify" id="modify" class="btn btn-success" value="Modifica evento" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>

                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    </div>

    <script>
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){
  event.preventDefault();
  if($('#name').val() == "")
  {
   alert("Inserire titolo dell'evento");
  }
  else if($('#place').val() == "")
  {
   alert("Inserire luogo dell'evento");
  }
  else if($('#data').val() == "")
  {
    alert("Inserire la data dell'evento")
  }
  else if($('#seats').val() == "")
  {
    alert("Inserire i posti disponibili")
  }
  else if($('#price').val() == "")
  {
    alert("Inserire il costo del biglietto")
  }
  else if($('#desc').val() == '')
  {
   alert("Inserire una descrizione dell'evento");
  }

  else
  {

   $.ajax({
    url:"insert.php",
    method:"POST",  
    data:$('#insert_form').serialize(),
    beforeSend:function(){
     $('#insert').val("Inserting");
    },
    success:function(data){
     $('#insert_form')[0].reset();
     window.location.href = "./index_organizzatore.php";
     //$('#createEventModal').hide();
     $('#btn-event').modal('hide');
     //window.location.replace="./index_organizzatore.php";

     //$('#employee_table').html(data);
    }
   });
  }
 });


<<<<<<< HEAD
 $(document).ready(function(){
 $('#modify-form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name2').val() == "")  
  {  
   alert("Inserire titolo dell'evento");  
  }  
  else if($('#place2').val() == "")  
  {  
   alert("Inserire luogo dell'evento");  
=======
 /*$(document).ready(function(){
 $('#modify-form').on("submit", function(event){
  event.preventDefault();
  if($('#name2').val() == "")
  {
   alert("Inserire titolo dell'evento");
  }
  else if($('#place2').val() == "")
  {
   alert("Inserire luogo dell'evento");
>>>>>>> feff80cdd5b6164e08f5344c70a8adb2af5de8f3
  }
  else if($('#data2').val() == "")
  {
    alert("Inserire la data dell'evento")
  }
  else if($('#seats2').val() == "")
  {
    alert("Inserire i posti disponibili")
  }
  else if($('#price2').val() == "")
  {
    alert("Inserire il costo del biglietto")
  }
  else if($('#desc2').val() == '')
  {
   alert("Inserire una descrizione dell'evento");
  }

  else
  {
      alert($('#id1').val());
<<<<<<< HEAD
    
   $.ajax({  
    url:"update.php",  
    method:"POST",  
    data:$('#modify-form').serialize(),  
    beforeSend:function(){  
     $('#modify').val("Inserting");  
    },  
    success:function(data){  
     $('#modify-form')[0].reset(); 
     window.location.href = "./index_organizzatore.php"; 
     $('#updateevent').modal('hide');  
     //$('#employee_table').html(data);  
    }  
   });  
  }  
=======

   $.ajax({
    url:"update.php",
    method:"POST",
    data:$('#modify-form').serialize(),
    beforeSend:function(){
     $('#modify').val("Inserting");
    },
    success:function(data){
     $('#modify-form')[0].reset();
     $('#<//?php echo $modifyEventModal; ?>').modal('hide');
     //$('#employee_table').html(data);
    }
   });
  }
>>>>>>> feff80cdd5b6164e08f5344c70a8adb2af5de8f3
 });
 });  */


 </script>

<div class="container justify-content-center col-md-4">
<hr class="upRegister">
<h2 class="text-center">I miei eventi</h2>
<hr class="downRegister">
</div>
<div id="events" class="container-fluid padding">
    <div class="row padding">
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title">Crea evento</h4>
                </div>
                <div class="card-body">
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
                                            <input type="datetime-local" class="form-control" name="data" id="data" min="2020-02-18T00:00" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="seats">Posti disponibili</label>
                                            <input type="number" class="form-control" name="seats" id="seats" disabled>
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
                    <button id="btn-event" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createEventModal" >Crea evento</button>
                </div>
            </div>
        </div>
        <?php $modifyEventModal=-1;
            foreach($templateParams["eventi"] as $evento):
            $modifyEventModal++; ?>
        <div id="orgEvent" class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $evento["event_name"]; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" style="line-height: 1;">
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
                            <th scope="row">Biglietti totali</th>
                            <td id="numPostiTot"><?php echo $evento["total_ticket"]; ?></td>
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
                    <?php
                      if($evento['event_date']<=date("Y-m-d H:i:s")){ ?>
                         <button id="btn-event" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#<?php echo $modifyEventModal; ?>" disabled>Modifica evento</button>
                      <?php }
                      else{
                         ?><button id="btn-event" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#<?php echo $modifyEventModal; ?>">Modifica evento</button>
                      <?php } ?>
                    <!-- <button id="btn-event<//?php echo($modifyEventModal);?>" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#<//?php echo $modifyEventModal; ?>">Modifica evento</button> -->
                    <div class="modal fade" id="<?php echo $modifyEventModal; ?>" tabindex="-1" role="dialog" aria-labelledby="modifyEventModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyEventModalTitle">Modifica Evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="was-validated" novalidate method="post" id="modify-form" action="update.php" >
                                        <div class="form-group">
                                            <label for="id1" hidden>Id</label>
                                            <input type="number" class="form-control" name="id1" id="id1" value="<?php echo $evento["event_id"]; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="cat2">Categoria</label>
                                            <select class="form-control" id="cat2" required>
                                            <option selected disabled>Non è possibile modificare la categoria dell'evento</option>
                                            <?php foreach($templateParams["categorie"] as $categoria): ?>
                                                <option disabled><?php echo $categoria["category_name"];?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name2">Nome evento</label>
                                            <input type="text" class="form-control" name="name2" id="name2" value="<?php echo $evento["event_name"]?>"  disabled />
                                        </div>
                                        <div class="form-group">
                                            <label for="place2">Luogo</label>
                                            <input type="text" class="form-control" name="place2" id="place2" value="<?php echo $evento["event_place"]?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="data2">Data e orario inizio</label>
                                            <input type="datetime-local" class="form-control" name="data2" id="data2" min="2020-02-18T00:00" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="seats2">Posti disponibili</label>
                                            <input type="number" class="form-control" name="seats2" id="seats2" value="<?php echo $evento["total_ticket"]?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="price2">Prezzo <i class="fa fa-euro"></i></label>
                                            <input type="number" class="form-control" name="price2" id="price2" value="<?php echo $evento["ticket_price"]?>" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label for="desc2">Descrizione</label>
                                            <textarea class="form-control" name="desc2" id="desc2" rows="3" <?php echo $evento["descriptions"]?> disabled><?php echo $evento["descriptions"]?></textarea>
                                        </div>

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
     window.location.href = "./index_organizzatore.php?atype=cli&error=ins";
     //$('#createEventModal').hide();
     $('#btn-event').modal('hide');
     //header("location: ./index_organizzatore.php?atype=cli&error=ins");
     //window.location.replace="./index_organizzatore.php";

     //$('#employee_table').html(data);
    }
   });
  }
 });
});
 </script>
    </div>
    </div>

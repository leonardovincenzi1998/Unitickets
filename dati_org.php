<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
          <li class="breadcrumb-item"><a href="index_organizzatore.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">I miei dati</li>
        </ol>
</nav>
<div class="container justify-content-center col-md-4">
<div class="form-group">
<?php foreach($templateParams["organizzatore"] as $organizer): ?>
    <form id="form-dati" action="modifica_dati_org.php" method="post">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name" value="<?php echo $organizer["organizer_name"] ?>" maxlength="30" disabled>

      <label for="surname">Cognome</label>
      <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $organizer["organizer_surname"] ?>" maxlength="30" disabled>

      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" id="email" value="<?php echo $organizer["organizer_email"] ?>" maxlength="55" required>

      <label for="tel">Telefono</label>
      <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $organizer["organizer_tel"] ?>" maxlength="10" required>

      <label for="date">Partita Iva</label>
      <input type="number" class="form-control" name="birthdate" id="birthdate" value="<?php echo $organizer["organizer_iva"] ?>" maxlength="11" disabled>

      <button type="submit" id="submit_dati" class="btn btn-outline-secondary" onclick="">Salva modifiche</button>
    </form>
<?php endforeach; ?>
</div>
</div>
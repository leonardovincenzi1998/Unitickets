<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">I miei dati</li>
        </ol>
</nav>
<div class="container justify-content-center col-md-4">
<div class="form-group">
<?php foreach($templateParams["utente"] as $user): ?>
    <form id="form-dati" action="modifica_dati.php" method="post">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name" value="<?php echo $user["name"] ?>" maxlength="30" disabled>

      <label for="surname">Cognome</label>
      <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $user["surname"] ?>" maxlength="30" disabled>

      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" id="email" value="<?php echo $user["user_email"] ?>" maxlength="55" required>

      <label for="tel">Telefono</label>
      <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $user["user_tel"] ?>" maxlength="10" required>

      <label for="date">Data di nascita</label>
      <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?php echo $user["birthdate"] ?>" disabled>

      <button type="submit" class="btn btn-outline-secondary" >Modifica dati</button>
    </form>
<?php endforeach; ?>
</div>
</div>
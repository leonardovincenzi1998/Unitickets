<?php

if($_GET['atype']=="cli"){
  ?>
  <div class="form-group">
    <form id="form-registrazione" action="register_function.php" method="post">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Nome" maxlength="30" required>

      <label for="surname">Cognome</label>
      <input type="text" class="form-control" name="surname" id="surname" placeholder="Cognome" maxlength="30" required>

      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" maxlength="55" required>

      <label for="password">Password</label>
      <input type="password" class="form-control" name="p" id="password" placeholder="Password" maxlength="16" required>

      <label for="tel">Telefono</label>
      <input type="tel" class="form-control" name="tel" id="tel" placeholder="Telefono" maxlength="10" required>

      <label for="date">Data di nascita</label>
      <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Data di nascita" required>

      <button type="submit" class="btn btn-outline-secondary" onclick="formhash(this.form, this.form.password)">Conferma</button>
    </form>
  <p class="text-center" id="downRegForm">Sei già registrato? <a href="login.php?atype=cli">Accedi!</a></br>
Non sei un cliente? Registrati come <a href="?atype=org">organizzatore</a></p> <?php
}
else{
                                          // funzione organizzatori
  ?><form id="form-registrazione" action="register_function_org.php" method="post">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Nome" maxlength="30" required>

    <label for="surname">Cognome</label>
    <input type="text" class="form-control" name="surname" id="surname" placeholder="Cognome" maxlength="30" required>

    <label for="email">E-mail</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" maxlength="55" required>

    <label for="password">Password</label>
    <input type="password" class="form-control" name="p" id="password" placeholder="Password" maxlength="16" required>

    <label for="tel">Telefono</label>
    <input type="tel" class="form-control" name="tel" id="tel" placeholder="Telefono" maxlength="10" required>

    <label for="iva">Partita iva</label>
    <input type="tel" class="form-control" name="iva" id="iva" placeholder="Numero partita iva" maxlength="11" required>

    <button type="submit" class="btn btn-outline-secondary" onclick="formhash(this.form, this.form.password)">Conferma</button>
  </form>
  <p class="text-center" id="downRegForm">Sei già registrato? <a href="login.php?atype=org">Accedi!</a></br>
Non sei un organizzatore? Registrati come <a href="?atype=cli">cliente</a></p><?php
}
 ?>

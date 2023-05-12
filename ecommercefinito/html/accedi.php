<?php

?>

<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<body>

<div class="container mt-3">
<h2 class="text-light">Benvenuto</h2>

<form action="checklogin.php" method="post">
  <div class="text-light mb-3 mt-4">
    <label for="User" class="form-label">Username:</label>
    <input type="text" class="form-control" id="User" placeholder="Inserisci Username" name="Username" required>
  </div>
  <div class="text-light mb-3">
    <label for="pswd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pswd" placeholder="Inserisci password" name="pwd" required>
  </div>
  <div class="text-light mb-3">
    <label for="amm" class="form-label">Amministratore:</label>
    <input type="checkbox" name="amm"><br>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 <a href="registrazione.php">Registrati</a>
</form>
</div>

<style>
body {
  background-image: url('images/backlogin.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

</body>

</html>
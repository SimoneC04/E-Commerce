<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<body>

<div class="container mt-3">
<h2 class="text-light">Benvenuto! Qui puoi lasciare una recensione al nostro prodotto</h2>

<form action="aggiungi.php" method="post">
<div class="text-light mb-3">
    <label for="recensione" class="form-label">Descrizione:</label>
    <input type="text" class="form-control" id="recensione" placeholder="Inserisci la tua recensione" name="recension"required>
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<style>
body {
  background-image: url('images/back1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

</body>

</html>
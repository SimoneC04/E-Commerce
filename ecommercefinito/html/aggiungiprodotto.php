<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<body>

<div class="container mt-3">
<h2 class="text-light">Benvenuto! Qui puoi aggiungere un nuovo prodotto al sito</h2>

<form action="aggiungi.php" method="post">
<div class="text-light mb-3">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="nome" placeholder="Inserisci nome prodotto" name="nom"required>
  </div>
  <div class="text-light mb-3">
    <label for="cat" class="form-label">Categoria:</label>
    <input type="text" class="form-control" id="cat" placeholder="Inserisci la categoria(1,2)" name="cate"required>
  </div>
  <div class="text-light mb-3 mt-4">
    <label for="desc" class="form-label">Descrizione:</label>
    <input type="text" class="form-control" id="desc" placeholder="Inserisci descrizione prodotto" name="Descrizione"required>
  </div>
  <div class="text-light mb-3">
    <label for="quant" class="form-label">Quantità:</label>
    <input type="text" class="form-control" id="quant" placeholder="Inserisci iquantità prodotto" name="quan" required>
  </div>
  <div class="text-light mb-3">
    <label for="prezzo" class="form-label">Prezzo:</label>
    <input type="text" class="form-control" id="prezzo" placeholder="Inserisci il prezzo" name="prezz" required>
  </div>
  <div class="text-light mb-3">
    <label for="immg" class="form-label">Link immagine:</label>
    <input type="file" class="form-control" id="immg" placeholder="Inserisci immagine" name="img" required>
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
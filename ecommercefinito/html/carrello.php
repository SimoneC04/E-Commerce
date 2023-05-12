<?php
session_start();
    include("connection.php")
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>TRAD'E</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="index.html"><h2 class="banner_taital">TRAD'E</h2></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="dettaglioprodotto.php">Prodotti</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="carrello.php">Carrello</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="accedi.php">Accedi</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="contact.php">Contattaci</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="logo"><a href="index.html"><img src="images/logo2.png"></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="index.php">Home</a></li>
                     <li><a href="dettaglioprodotto.php">Prodotti</a></li>
                     <li><a href="carrello.php">Carrello</a></li>
                     <li><a href="accedi.php">Accedi</a></li>
                     <li><a href="contact.php">Contattaci</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Carrello: </h1>
            <?php
            if(isset($_SESSION["id"])){
               $sql="SELECT * FROM (carrello as cart JOIN contiene as cont ON cart.IdCarrello=cont.IdCarrello) JOIN prodotti as prod ON cont.IdProdotto=prod.IdProdotto WHERE cart.IdUtente=" .$_SESSION["id"] . "";
           }else{
               header('location:index.php?msg=non sei loggato');
           }
           
           $result=$conn->query($sql);
           if ($result) {
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       echo "<tr><td>" . $row["IdCarrello"] . "</td>" . "<td><img class='card-img-top' width='200' height='200' src='" . $row["Immagine"] . " '/>" . "</td>" .
                       "<td><a href='prodottocompleto.php?id=". $row["IdProdotto"] ."'>" . $row["Nome"] . "</a></td>" . 
                       "<td>" . $row["Prezzo"] . "$" . "</td>" .
                       "<td>" . $row["dataDiAggiunta"] . "</td>" . 
                       "<td><a class='btn btn-primary' href='rimuovidalcarrello.php?id=" .$row["IdProdotto"] ."'>Rimuovi</a>" . "</td></tr>";         
                   }
               } else {
                   echo "NON HAI ANCORA INSERITO NULLA NEL CARRELLO";
               }
                   $conn->close();
               } else {
                   echo "Error in " . $sql . " " . $conn->error;
               }

               echo "<a class='text-black' href='paga.php'>" . 'Ordina e Paga' . "</a>";

           ?>
         </div>
      </div>


</body>
</html>
<?php
session_start();
include("connection.php");


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
               <div class="logo_mobile"><a href="index.html">
                     <h2 class="banner_taital">TRAD'E</h2>
               </div>
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

   <?php
   if (isset($_GET["id"])) {
      $sql = "SELECT  * FROM prodotti WHERE IdProdotto = '" . $_GET["id"] . "'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
         echo "<div class='container'>
           <div class='row'>
              <div class='col-xs-4 item-photo'>
                   <img style='max-width:100%;' src=' " . $row["Immagine"] . " ' />
                   </div>" .
            "<div class='col-xs-5' style='border:0px solid gray'>
                    
            <h3>" . $row['Nome'] . "</h3>    
            <h5 style='color:#337ab7'>venduto da <a href='#'>Anonimo</a> · <small style='color:#337ab7'>(5054 ventas)</small></h5>" .

            "<h6 class='title-price'><small>OFFERTA</small></h6>
            <h3 style='margin-top:0px;'> " . $row['Prezzo'] . "</h3>" .


            "<div class='section' style='padding-bottom:20px;'>
            <h6 class='title-attr'><small>QUANTITA</small></h6>                    
            <div>
                <div class='btn-minus'><span class='glyphicon glyphicon-minus'></span></div>
                <input value='1' />
                <div class='btn-plus'><span class='glyphicon glyphicon-plus'></span></div>
            </div>
        </div> " .

            " <div class='section' style='padding-bottom:20px;'>
        <a href='checkcarrello.php?id=" .$row["IdProdotto"] ."'><button class='btn btn-success'><span style='margin-right:20px' class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Aggiungi al carrello</button></a>
    </div>                                        
</div>" .
            "<div class='col-xs-9'>
 <ul class='menu-items'>
     <li class='active'>Dettagli Prodotto</li>
    
     <li>Certificato</li>
   </ul>
      </div>		
   </div>
   </div> ";

         $sql = "SELECT * FROM recensioni WHERE IdProdotto= '" . $row["IdProdotto"] . "'";
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";



            if (isset($_SESSION["amm"]))
            if ($_SESSION["amm"] == true) {
               echo "<a class='text-black' href='aggiungirecensione.php?id='>" . 'Aggiungi Recensione' . "</a>";
        }
         }


      }
   }
   ?>



</body>

</html>
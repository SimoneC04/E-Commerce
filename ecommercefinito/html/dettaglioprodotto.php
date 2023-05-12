<?php
session_start();
include("connection.php");
$filt = "";
if (isset($_POST["filt"])) {
    $filt = $_POST["filt"];
}
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
 <div class="container-fluid">
  <h3 class="text-black">Benvenuto
               <?php
               echo $_SESSION['Username'];
               /*echo $_SESSION['amm'];*/
               ?>
               <h3>

               <form action="" role="search" method="get">
                            <input type="text" name="filtro"> 
                            <button class="btn btn-outline-dark" type="submit">
                                Cerca         
                            </button>
                  </form>

  <div class="container mt-3 text-dark">
  <table border="1px" class="table table-striped text-black">
        <h3 class="text-black">
            Categoria Prodotto:
         </h3>

        <form action="dettaglioprodotto.php" method="POST">
            <select name='filt'>
                <?php
                $sql = "SELECT DISTINCT(IdCategoria) from prodotti where 1 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<option disabled='disabled'>-</option>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<option>" . $row["IdCategoria"] . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit">applica</button>
        </form>


        <?php
        if ($filt != "") {
            $sql = "SELECT * from prodotti where IdCategoria ='$filt' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
               echo "<div class='services_section_2'>" .
               "<div class='row'>" ;
                while ($row = $result->fetch_assoc()) {
                  echo
                  "<div class='col-md-4'>" . 
                     "<div><img width='300' height='300' src=' " . $row["Immagine"] . " ' class='services_img'></div>" . 
                     "<div class='btn_main'><a href='prodottocompleto.php?id=" . $row['IdProdotto']."'>" . $row['Nome'] . "</a></div>" .
                  "</div>";
                }
            }
        } else {
            $sql = "SELECT * from prodotti where 1 ";
            $result = $conn->query($sql);
            echo "<div class='services_section_2'>" .
            "<div class='row'>" ;
            while ($row = $result->fetch_assoc()) {
          echo
            "<div class='col-md-4'>" . 
               "<div><img width='300' height='300' src=' " . $row["Immagine"] . " ' class='services_img'></div>" . 
               "<div class='btn_main'><a href='prodottocompleto.php?id=" . $row['IdProdotto']."'>" . $row['Nome'] . "</a></div>" .
            "</div>";


          if (isset($_SESSION["amm"]))
            if ($_SESSION["amm"] == true) {
               echo "<a class='text-black' href='aggiungiprodotto.php'>" . 'Nuovo Prodotto' . "</a>".
               "<a class='text-black' href='cancellaprodotto.php?id=" . $row['IdProdotto']."'></a>";
        }
        else{
         ;
        }
          
          
            }
            echo "</div>" .
            "</div>";
            
        }
        

        ?>
    </table></div>


 </div>
</div>



<style>
body {
  background-image: url('orange.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

</body>
</html>
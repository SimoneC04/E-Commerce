<?php
   ob_start();
   session_start();

    include("connection.php");
    if(isset($_SESSION['id'])){
        $sql="DELETE FROM contiene WHERE IdProdotto='" . $_GET["id"] . "'";
        $result=$conn->query($sql);
        $conn->close();
        header("location:carrello.php?msg=prodotto rimosso correttamente!");
    } else
        header("location:carrello.php?msg=il prodotto non è stato rimosso");
?>
<?php
session_start();
include "connection.php";


if(isset($_GET["id"])){
    $sql = "DELETE FROM prodotti WHERE IdProdotto = '" . $_GET["id"] . "'";
    $result = $conn->query($sql);

        echo "Cancellato con successo!!";
    }else{
        echo "Nessun elemento trovato";
    }
?>

<a href="dettaglioprodotto.php">Torna all'elenco</a><br>
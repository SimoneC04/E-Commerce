<?php
session_start();
    include("connection.php");
    $Nome = $_POST['nom'];
    $Cat = $_POST['cate'];
    $Desc = $_POST["Descrizione"];
    $Link = "images/" . $_POST["img"];
    $Quant = $_POST['quan'];
    $Prezzo = $_POST['prezz'];
    $Venditore = $_SESSION['Username'];
    
         $i=random_int(5,100);
       
            $sql= "INSERT INTO prodotti (IdProdotto, Nome, IdCategoria,  Descrizione, Quantita, Prezzo, Immagine, Venditore) VALUES ('$i','$Nome','$Cat','$Desc','$Quant','$Prezzo','$Link','$Venditore')";
            
            echo $sql;
            $result = $conn->query($sql);
            $conn->close();
            
           
            header("location:dettaglioprodotto.php?msg=foto aggiunta con successo!");
            
?>
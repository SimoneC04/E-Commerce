<?php
session_start();
ob_start();
?>

<?php  
    include("connection.php");
    $sql="SELECT IdCarrello FROM carrello WHERE IdUtente=".$_SESSION["id"]."";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    
        $sql = "INSERT INTO contiene (IdProdotto,IdCarrello) 
                VALUES (" . $_GET["id"] . "," . $row["IdCarrello"] . ")"; 
        echo $sql;
        $result = $conn->query($sql);
        $conn->close();

        header("location:carrello.php");
?>

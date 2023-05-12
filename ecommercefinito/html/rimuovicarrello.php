<?php
session_start();
?>

<?php
include("connection.php");
if (isset($_SESSION['id'])) {
    $sql = "DELETE FROM carrello WHERE IdUtente='" . $_SESSION["id"] . "'";
    $result = $conn->query($sql);
    $conn->close();
    header("location:newCart.php?msg=prodotto rimosso correttamente!");
}
?>
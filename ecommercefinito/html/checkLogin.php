<?php
session_start();
include "connection.php";

/*$sql = "SELECT * FROM utenti 
where Nome ='" . $_POST['Username']. "' and Password='".md5( $_POST['pwd'])."'";
$result = $conn->query($sql);*/



// prepare and bind
$stmt = $conn->prepare("SELECT * FROM utenti 
where Username = ? and Password=?");
$stmt->bind_param("ss", $user, $pass);

// set parameters and execute
$user = $_POST['Username'];
$pass = md5( $_POST['pwd']);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    $_SESSION["Username"]=$_POST["Username"];
    $_SESSION["id"] = $row["IdUtente"];
    if($row["Amministratore"]==1)   /* 1 amministratore 0 utente*/
    {
        $_SESSION["amm"]=$row["Amministratore"];
    }

    header("Location: index.php");
}
else
{
   header("Location: accedi.php");
}

$stmt->close();
$conn->close();

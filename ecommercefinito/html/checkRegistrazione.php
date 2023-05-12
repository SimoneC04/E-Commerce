<?php
session_start();
include "connection.php";

            $pass = md5($_POST['pwd']);
            $user = $_POST["Username"];
            $i =0;

            //$sql = "INSERT INTO utenti (IDUtente,Nome,Password) VALUES ('$i','$user','$pass')";

            //// prepare and bind
if($_POST['pwd'] != "" && $user != "")
{
    $stmt = $conn->prepare("INSERT INTO utenti (IDUtente,Nome,Password) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id, $username, $password);
    
    // set parameters and execute
    $id = 1+random_int(1,100);
    $username = $_POST["Username"];
    $password = md5($_POST['pwd']);
    $stmt->execute();
    
    
     echo "New record created successfully";
     header("Location: home.php");
     
    
                mysqli_close($conn);
                $stmt->close();
}
else
{
    $message = "ERRORE DEI PARAMETRI";
    $_SESSION["message"]= "ERRORE DEI PARAMETRI";
    //echo "<script>alert('ERRORE DEI PARAMETRI');</script>";
    header("Location: registrazione.php?message=".$_SESSION["message"]);
    
}
?>

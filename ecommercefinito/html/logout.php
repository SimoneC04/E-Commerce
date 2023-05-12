<?php
//fa il logout da tutto l'accesso
session_start();
unset($_SESSION["id"]);
unset($_SESSION["Username"]);
unset($_SESSION["amm"]);
session_destroy();
header('location:index.php?');
?>
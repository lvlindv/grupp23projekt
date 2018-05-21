<?php
//Avslutar session så att användaren loggas ut och kopplas tillbaka till startpage.php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["name"]);
header("Location: startpage.php");

 ?>

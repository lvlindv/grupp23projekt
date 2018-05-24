<?php
session_start();
// Avslutar session så att användaren loggas ut och kopplas tillbaka till startpage.php
unset($_SESSION["email"]);
unset($_SESSION["name"]);
// Skickar användaren till startpage.php
header("Location: startpage.php");
 ?>

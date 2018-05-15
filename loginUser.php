<?php
// Start the session
session_start();

//Kopplar till databasen via db_connect.php
include "db_connect.php"

?>

<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <head>
    <script src="studybuddy.js"></script>
    <meta charset="utf-8">
    <title>Startsida</title>
  </head>

  <body>
    <?php
    // Set session variables
    $_SESSION["email"] = $_POST['email'];
    $_SESSION["psw"] = $_POST['psw'];
    echo "Session variables are set.";

    echo $_SESSION["email"];
    echo $_SESSION["psw"];
    ?>
  </body>

</html>

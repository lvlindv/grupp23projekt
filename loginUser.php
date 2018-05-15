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
      echo "Hello";
      echo $_SESSION['username'];
      echo $_SESSION['psw'];
    ?>
  </body>

</html>

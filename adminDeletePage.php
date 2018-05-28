<?php
// Startar sessionen
session_start();
// Kopplar till databasen
include 'db_connect.php';
// Kopplar till fil med queries
include 'queries.php';
// Koppling till fil med funktioner
include "functions.php";
// Kollar om användare är inloggad som admin
loggedInAsAdmin();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Koppling till javascript-fil -->
    <script src="functions.js"></script>

    <!-- Koppling till css-filer -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="startpage.css">
    <link rel="stylesheet" href="popUp.css">

    <title>Radera</title>
    </head>

    <body>

      <?php

        // Skapar en variabel för det valda coachId
        $currentCoachId = $_GET['id'];
        // Kopplar till databasen och använder functionen deleteStudyCoach på variabeln
        if ($connection ->query(deleteStudyCoach($currentCoachId)))
        {
        ?>
          <div class="popUp">
            <?php
              // Visar att förfrågan gått igenom
              echo '<div class="popUpMsg"><h2>Studiecoach raderad!</h2></div>';
              // Länk tillbaka till adminStartpage.php
              echo '<a href="adminStartpage.php" class="linkStartpage">Tillbaka till startsidan</a>';
            ?>
          </div>
        <?php
        }
        else
        {
          // Visar att förfrågan ej gick igenom och printar ut SQL-satsen.
          echo "Något gick fel.". $sql. "<br>". $connection->error;
          // Länk tillbaka till adminStartpage.php
          echo '<a href="adminStartpage.php">Försök igen</a>';
        }
        // Stänger databaskopplingen.
        $connection->close();
      ?>

</div>
</body>
</html>

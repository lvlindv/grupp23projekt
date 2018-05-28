<?php
  // Startar sessionen
  session_start();

  // Koppling till databas
  include 'db_connect.php';

  // Koppling till fil med queries
  include "queries.php";

  // Koppling till fil med funktioner
  include "functions.php";

  // Kollar om studiecoach är inloggad
  loggedInAsStudyCoach();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Koppling till javascript-fil -->
    <script src="functions.js"></script>

    <!-- Koppling till css-fil -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="startpage.css">
    <link rel="stylesheet" href="popUp.css">

    <!-- Titel på flik -->
    <title>Felmeddelande</title>
  </head>

    <body>
      <?php

        if(isset($_POST['btnAdd']))
        {
          // Lagrar vald dag i sessionvariabeln
          $_SESSION['selectedDay'] = $_POST['dayName'];
        }

        // Lagrar värdena av sessionvariablerna i nya varibler som ska sättas in i query
        $selectedDay = $_SESSION['selectedDay'];
        $coachId = $_SESSION['coachId'];

        // Hämtar studiecoachers tillgänglighet
        $result = mysqli_query($connection, checkAvailability($selectedDay, $coachId));

        // Kollar om studiecoach redan markerat sig som tillgänglig den valda dagen
        if(mysqli_num_rows($result)>0)
        {
          // Skickar vidare till startsida + meddelande om att den valda dagen redan markerats som tillgänglig
          header("Location: coachStartpage.php?msg=alreadyAvailable");
        }
        else
        {
          // Query för att lägga till tillgänglig studiecoach i databasen
          if ($connection->query(addAvailability($selectedDay, $coachId)))
          {
        ?>
        
          <!-- Skapar en klass för att göra en ruta som ska ligga bakom nedanstående kod (information) -->
          <div class="popUp">

          <?php
            echo '<div class="popUpMsg"><h2>Du har nu angett att du är tillgänglig på '.$selectedDay.'</h2></div>';
            echo '<a class="linkStartpage" href="coachStartpage.php">Tillbaka till din sida</a>';
          ?>
          </div>
          <?php
          }
          else
          {
          // Skickar vidare till startsida + felmeddelande
          header("Location: studentStartpage.php?msg=felmeddelande");
          }
          $connection->close();
        }
      ?>
    </div>
  </body>
</html>

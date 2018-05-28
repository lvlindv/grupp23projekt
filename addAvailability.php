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

    <title>Felmeddelande</title>
    </head>

    <body>

    <div class="popUp">


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
    // DENNA ÄR EJ FULLSTÄNDIG - REDIGERA!
    echo '<a class="already">Du har redan angett att du är tillgänglig på </a>'.$selectedDay."!";
    echo '<a href="coachStartpage.php" class="buttonBack2">Tillbaka till din sida</a>';
  }
  else
  {
    // Query för att lägga till tillgänglig studiecoach i databasen
    if ($connection->query(addAvailability($selectedDay, $coachId)))
    {
      // DENNA ÄR EJ FULLSTÄNDIG - REDIGERA!
      echo '<a class="already">Du har nu angett att du är tillgänglig på </a>'.$selectedDay."!";
      echo '<a href="coachStartpage.php" class="buttonBack2">Tillbaka till din sida</a>';
    }
    else
    {
        echo '<a class="wrong">Något gick fel...</a>';
        echo '<a href="coachStartpage.php" class="tryAgain">Vänligen försök igen</a>';
    }
    $connection->close();
  }

?>

</div>
</body>
</html>

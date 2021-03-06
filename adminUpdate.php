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
    <title>Ett fel uppstod</title>
  </head>
  <body>
    <div class="popUp">
      <?php
      // startar sessionen på sidan
      session_start();
      // Kopplar till databasen
      include "db_connect.php";
      // Kopplar till queries.php
      include "queries.php";
      // Koppling till fil med funktioner
      include "functions.php";
      // Kollar om användare är inloggad som admin
      loggedInAsAdmin();
      // Sätter variabler
      $coachId =  $_POST['coachId'];
      $name =     $_POST['name'];
      $email =    $_POST['email'];
      $psw =      $_POST['psw'];
      $des =      $_POST['description'];
      $phnr =     $_POST['phoneNr'];

      // Sätter in/kör SQL-satsen i databasen.
      if ($connection->query(updateStudyCoach($name, $email, $psw, $des, $coachId, $phnr)))
      {
        // Visar att en ny studiecoach har lagts till i databasen
        echo '<div class="popUpMsg"><h2>Studiecoach redigerad.</h2></div>';
        // Länk tillbaka till adminstartpage.php
        echo '<a href="adminStartpage.php" class="linkStartpage">Tillbaka till startsidan</a>';
      }
      else
      {
        // Visar att SQL-satsen inte lyckades läggas till
        echo "Något gick fel...". $sql. "<br>". $connection->error;
        // Länk tillbaka till adminstartpage
        echo '<a href="adminStartpage.php">Försök igen.</a>';
      }
      // avslutar
      $connection->close();
       ?>
     </div>
   </body>
</html>

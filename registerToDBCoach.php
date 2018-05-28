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

      <title>Registrering</title>
    </head>
    <body>
    <div class="popUp">
      <?php
      session_start();
      // Kopplar till databasen
      include 'db_connect.php';
      // Kopplar till queries.php
      include 'queries.php';
      // Koppling till fil med funktioner
      include "functions.php";
      // Kollar om användare är inloggad som admin
      loggedInAsAdmin();

      // Skapar variabler
      $name = $_POST['name'];
      $email = $_POST['email'];
      $psw = $_POST['psw'];
      $des = $_POST['description'];
      $phnr = $_POST['phoneNr'];

      // Sätter in/kör SQL-satsen i databasen.
      if ($connection->query(addStudyCoach($name, $email, $psw, $des, $phnr)))
      {
        // Visar att en ny studiecoach har lagts till i databasen
        echo '<a class="userSaved">Studiecoachen sparad!</a>';
        // Länk tillbaka till adminstartpage.php
        echo '<a href="adminStartpage.php" class="buttonBack">Tillbaka till startsidan</a>';

        // Hämtar rader i tabellen StudyCoach som motsvarar den nya studiecoachen
        $resultNewStudyCoach = mysqli_query($connection, getStudyCoach($email, $psw));

        $row = $resultNewStudyCoach->fetch_assoc();

        // Hämtar den nya studiecoachens ID
        $coachId = $row["coachId"];

        // Lägger till varje valt ämne och coachID i tabellen CoachSubjects
        foreach ($_POST['subject'] as $subject)
        {
          $connection->query(addCoachStubject($subject, $coachId));
        }

      }
      else
      {
        // Visar att studiecoachen inte lyckades läggas till
        echo "Något gick fel.". $sql. "<br>". $connection->error;
        // Länk tillbaka till adminstartpage
        echo '<a href="adminStartpage.php">Försök igen.</a>';
      }
      // Avslutar databaskoppling
      $connection->close();
      ?>
    </div>
  </body>
</html>

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

        // Hämtar rader i tabellen StudyCoach som motsvarar angiven email och lösenord
        $resultNewStudyCoach = mysqli_query($connection, getStudyCoach($email, $psw));

        $row = $resultNewStudyCoach->fetch_assoc();

        $coachId = $row["coachId"];

        foreach ($_POST['subject'] as $subject)
        {
          $query = "INSERT INTO CoachSubjects(subjectName, coachId) VALUES ('$subject', '$coachId')";

          $connection->query($query);
        }

      }
      else
      {
        // Visar att SQL-satsen inte lyckades läggas till
        echo "Något gick fel.". $sql. "<br>". $connection->error;
        // Länk tillbaka till adminstartpage
        echo '<a href="adminStartpage.php">Försök igen.</a>';
      }
      // avslutar
      $connection->close();
      ?>
    </div>
  </body>
</html>

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
    <!-- Skapar en klass  -->
    <div class="popUp">

<?php
// Kopplar till databasen
include 'db_connect.php';
// Kopplar till fil med queries
include 'queries.php';
// Koppling till fil med funktioner
include "functions.php";
// Kollar om användare är inloggad som admin
session_start();
loggedInAsAdmin();

// Skapar en variabel för det valda coachId
$currentCoachId = $_GET['id'];
// Kopplar till databasen och använder functionen deleteStudyCoach på variabeln
if ($connection ->query(deleteStudyCoach($currentCoachId)))
{
  // Visar att förfrågan gått igenom
  echo '<a class="userSaved">Studiecoach raderad!</a>';
  // Länk tillbaka till adminStartpage.php
  echo '<a href="adminStartpage.php" class="buttonBack">Tillbaka till startsidan</a>';

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

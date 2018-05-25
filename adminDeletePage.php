<?php
// Kopplar till databasen
include 'db_connect.php';
// Kopplar till fil med queries
include 'queries.php';
// Koppling till fil med funktioner
include "functions.php";
// Kollar om användare är inloggad som admin
loggedInAsAdmin();

// Skapar en variabel för det valda coachId
$currentCoachId = $_POST['coachId'];
// Kopplar till databasen och använder functionen deleteStudyCoach på variabeln
if ($connection ->query(deleteStudyCoach($currentCoachId)))
{
  // Visar att förfrågan gått igenom
  echo "Du har raderat Studiecoachen!";
  // Länk tillbaka till adminStartpage.php
  echo '<a href="adminStartpage.php">Tillbaka till startsidan.</a>';
}
else
{
  // Visar att förfrågan ej gick igenom och printar ut SQL-satsen.
  echo "Något gick fel.". $sql. "<br>". $connection->error;
  // Länk tillbaka till adminStartpage.php
  echo '<a href="adminStartpage.php">Försök igen.</a>';
}
// Stänger databaskopplingen.
$connection->close();
?>

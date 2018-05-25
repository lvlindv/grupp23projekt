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

// sätter variabler
$coachId = $_POST['coachId'];
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];


// Sätter in/kör SQL-satsen i databasen.
if ($connection->query(updateStudyCoach($name, $email, $psw, $des, $coachId, $phnr)))
{
  // Visar att en ny studiecoach har lagts till i databasen
  echo "Du har redigerat studiecoachen!";
  // Länk tillbaka till adminstartpage.php
  echo '<a href="adminStartpage.php">Tillbaka till startsidan.</a>';
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

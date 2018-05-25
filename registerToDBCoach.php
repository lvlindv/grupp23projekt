<?php
session_start();
// Kopplar till databasen
include 'db_connect.php';
// Kopplar till queries.php
include 'queries.php';
// Skapar variabler
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];

echo $name;
// Använder funktionen regStudyCoach från queries.php med variablerna som parametrar.

// Sätter in SQL-satsen i databasen.
if ($connection->query(addStudyCoach($name, $email, $psw, $des, $phnr)))
{
  // Visar att en ny studiecoach har lagts till i databasen
  echo "Du har lagt till en ny studiecoach!";
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

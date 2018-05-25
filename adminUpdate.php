<?php
session_start();
include "db_connect.php";
include "queries.php";

$coachId = $_POST['coachId'];
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];



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

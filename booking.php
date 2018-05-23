<?php

// Start the session
session_start();

//Koppling till databas
include "db_connect.php";

//Koppling till fil med queries
include "queries.php";

$selectedDay = $_SESSION["selectedDay"];
$selectedSubject = $_SESSION["selectedSubject"];
$currentCoachId = $_POST['coachId'];
$currentStudentId = $_SESSION["studentId"];

echo $_SESSION["studentId"];

if ($connection ->query(addBooking($selectedDay, $selectedSubject, $currentCoachId, $currentStudentId)))
{
  echo "Du har lagt till en ny bokning!";
  echo '<a href="studentStartpage.php">Tillbaka till startsidan.</a>';
}
else
{
  echo "Något gick fel.". $sql. "<br>". $connection->error;
  echo '<a href="studentStartpage.php">Försök igen.</a>';
}
$connection->close();

//Skickar vidare till startsida
//header("Location: studentStartpage.php");

?>

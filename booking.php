<?php

// Startar sessionen
session_start();

// Koppling till databasen
include "db_connect.php";

// Koppling till fil med queries
include "queries.php";

// Koppling till fil med funktioner
include "functions.php";

// Kollar om student är inloggad
loggedInAsStudent();

// Tilldelar variblerna(selectedDay, selectedSubject, studentId) värdet av sessionsvariabler.
$selectedDay = $_SESSION['selectedDay'];
$selectedSubject = $_SESSION['selectedSubject'];
$currentStudentId = $_SESSION['studentId'];
// Sätter coachId till en variabel.
$currentCoachId = $_POST['coachId'];

// Lägger till en bokning i databasen, med hjälp av funktionen addBooking från queries.php
// Placerar in sessionsvariablerna och variabeln som parametrar.
if ($connection ->query(addBooking($selectedDay, $selectedSubject, $currentStudentId, $currentCoachId)))
{
  // Visar att en ny bokning lyckats
  echo "Du har lagt till en ny bokning!";
  // Länk till studentStartpage.php
  echo '<a href="studentStartpage.php">Tillbaka till startsidan.</a>';

  if ($connection ->query(deleteAvailability($selectedDay, $currentCoachId)))
  {
    echo "Tillgänglighet borttagen.";
  }
  else
  {
    echo "Något gick fel.". $sql. "<br>". $connection->error;
    echo '<a href="studentStartpage.php">Försök igen.</a>';
  }

}
else
{
  // Visar att förfrågan ej gick igenom och printar ut SQL-satsen.
  echo "Något gick fel.". $sql. "<br>". $connection->error;
  // Länk till studentStartpage.php
  echo '<a href="studentStartpage.php">Försök igen.</a>';
}
// Stänger databaskopplingen
$connection->close();

// Skickar vidare till startsida
header("Location: studentStartpage.php");

?>

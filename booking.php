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

// Hämtar studenters bokningar
$result = mysqli_query($connection, checkBooking($selectedDay, $currentStudentId));

// Kollar om student redan har en bokning den valda dagen
if(mysqli_num_rows($result)>0)
{
  // Skickar vidare till startsida + meddelande om att bokning redan finns den valda dagen
  header("Location: studentStartpage.php?msg=bokningfinns");
}
// Annars bokas tillfället
else
{
  // Lägger till en bokning i databasen, med hjälp av funktionen addBooking från queries.php
  // Placerar in sessionsvariablerna och variabeln som parametrar.
  if ($connection ->query(addBooking($selectedDay, $selectedSubject, $currentStudentId, $currentCoachId)))
  {
    // Skickar vidare till startsida + meddelande om att bokning lyckades
    header("Location: studentStartpage.php?msg=nybokning");

    if ($connection ->query(deleteAvailability($selectedDay, $currentCoachId)))
    {
      echo "Tillgänglighet borttagen.";
    }
    else
    {
      echo "Något gick fel.". $sql. "<br>". $connection->error;
    }

  }
  else
  {
    // Visar att förfrågan ej gick igenom och printar ut SQL-satsen.
    echo "Något gick fel.". $sql. "<br>". $connection->error;
    // Skickar vidare till startsida + felmeddelande
    header("Location: studentStartpage.php?msg=felmeddelande");
  }
  // Stänger databaskopplingen
  $connection->close();
}

?>

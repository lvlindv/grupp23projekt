<?php
  // Start the session
  session_start();

  //Koppling till databas
  include 'db_connect.php';

  if(isset($_POST['btnAdd']))
  {
    // Lagrar vald dag i sessionvariabeln
    $_SESSION['selectedDay'] = $_POST['dayName'];
  }

  //Lagrar värdena av sessionvariablerna i nya varibler som ska sättas in i query
  $selectedDay = $_SESSION['selectedDay'];
  $coachId = $_SESSION['coachId'];

  //Query för att lägga till tillgänglig studiecoach i databasen
  $query = "INSERT INTO Availability(day, coachId)
  VALUES ('$selectedDay', '$coachId')";

  if ($connection->query($query)) {
    echo "Du har nu angett att du är tillgänglig på ".$_SESSION['selectedDay'].".";
    echo '<a href="coachStartpage.php">Tillbaka till din sida.</a>';
    }
  else {
      echo "Något gick fel.";
      echo '<a href="coachStartpage.php">Vänligen försök igen.</a>';
    }
  $connection->close();
?>

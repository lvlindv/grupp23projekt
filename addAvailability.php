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

  echo $_SESSION['selectedDay'];
  echo $_SESSION['coachId'];

  //Query för att lägga till tillgänglig studiecoach i databasen
  $query = "INSERT INTO Availability(day, coachId)
  VALUES ('$_SESSION['selectedDay']', '$_SESSION['coachId']')";


  if ($connection->query($query)) {
    echo "worked";
    }
  else {
      echo "try again".$query."<br>".$connection->error;
    }
  $connection->close();
?>

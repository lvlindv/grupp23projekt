<?php
  // Start the session
  session_start();

  //Koppling till databas
  include 'db_connect.php';

  //Variabeln $dag antar värdet av den dag som är vald i dropdown-listan
  $day = $_SESSION['selected_day'];
  //Variabeln $coachId antar värdet av den inloggade coachensID
  $coachID = mysqli_query($connection, 'SELECT coachID FROM StudyCoach WHERE email="'.$_SESSION["email"].'" ');

  //Lägger till tillgänglig studiecoach i databasen
  $queryAddAvailability = "INSERT INTO Availability(day, coachId)
  VALUES ('$day', '$coachId')";


  if ($connection ->query($queryAddAvailability)) {
    echo "worked";
    }
  else {
      echo "try again". $queryAddAvailability. "<br>". $connection->error;
    }
  $connection->close();
?>

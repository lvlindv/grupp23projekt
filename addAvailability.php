<?php
  include 'db_connect.php';

  //Variabeln $dag antar värdet av den dag som är vald i dropdown-listan
  $day = $_POST["name"];
  //Variabeln $coachId antar värdet av den inloggade coachensID
  $coachId = ...

  //Lägger till tillgänglig studiecoach i databasen
  $queryAddAvailability = "INSERT INTO Availability(day, coachId)
  VALUES ('$day', '$coachId')";


  if ($connection ->query($sql)) {
    echo "worked";
    }
  else {
      echo "try again". $sql. "<br>". $connection->error;
    }
  $connection->close();
?>

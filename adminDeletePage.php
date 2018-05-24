<?php
include 'db_connect.php';
 ?>

<?php

$currentCoachId = $_POST['coachId'];
include 'queries.php';

if ($connection ->query(deleteStudyCoach($currentCoachId)))
{
  echo "Du har raderat Studiecoachen!";
  echo '<a href="adminStartpage.php">Tillbaka till startsidan.</a>';
}
else
{
  echo "Något gick fel.". $sql. "<br>". $connection->error;
  echo '<a href="adminStartpage.php">Försök igen.</a>';
}
$connection->close();

?>

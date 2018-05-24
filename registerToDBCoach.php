<?php
// Kopplar till databasen
include 'db_connect.php';
// Kopplar till queries.php
include 'queries.php'
// Skapar variabler
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];

// Använder funktionen regStudyCoach från queries.php med variablerna som parametrar.
$connection->query(regStudyCoach($name, $email, $psw, $des, $phnr));
//
if ($connection ->query($sql))
{
  echo "Du har lagt till en ny studiecoach!";
  echo '<a href="adminStartpage.php">Tillbaka till startsidan.</a>';
}
else
{
  echo "Något gick fel.". $sql. "<br>". $connection->error;
  echo '<a href="adminStartpage.php">Försök igen.</a>';
}
$connection->close();
?>

function regStudyCoach($name, $email, $password, $description, $phoneNr)
{
  $query = "INSERT INTO StudyCoach(name, email, password, description, phoneNr)
  VALUES ('$name', '$email', '$psw', '$des', '$phnr')";

  return $query;
}

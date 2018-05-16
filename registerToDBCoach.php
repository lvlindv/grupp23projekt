<?php
include 'db_connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];

//Admin registrerar en studycoach i databasen via adminsidan.
$sql = "INSERT INTO StudyCoach(name, email, password, description, phoneNr)
VALUES ('$name', '$email', '$psw', '$des', '$phnr')";


if ($connection ->query($sql)) {
  echo "Du har lagt till en ny StudyCoach!";
  echo '<a href="adminStartpage.php">Tillbaka till Admin startsidan.</a>';
}
else {
  echo "try again". $sql. "<br>". $connection->error;
}
$connection->close();
?>

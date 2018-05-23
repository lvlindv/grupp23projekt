<?php
include 'db_connect.php';
//skapa variabler
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];

//Admin registrerar en studycoach i databasen via adminsidan.
$sql = "INSERT INTO StudyCoach(name, email, password, description, phoneNr)
VALUES ('$name', '$email', '$psw', '$des', '$phnr')";


if ($connection ->query($sql)) {
  echo "Du har lagt till en ny studiecoach!";
  echo '<a href="adminStartpage.php">Tillbaka till startsidan.</a>';
}
else {
  echo "Något gick fel.". $sql. "<br>". $connection->error;
  echo '<a href="adminStartpage.php">Försök igen.</a>';
}
$connection->close();
?>

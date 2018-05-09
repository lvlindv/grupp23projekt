<?php
include 'db_connect.php';


$name = $_POST['namn'];
$email = $_POST['email'];
$Lösenord = $_POST['psw'];
$mobilnr = $_POST['mnr'];

$sql = "INSERT INTO Student (namn, epost, lösenord, mobilNr)
VALUES ('$name', '$email', '$lösenord','$mobilnr')";


if ($connection ->query($sql) === TRUE) {
  echo "worked";
}
else {
  echo "try again". $sql. "<br>". $connection->error;
}
$connection->close();
?>

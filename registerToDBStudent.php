<?php
include 'db_connect.php';


$name = $_POST['namn'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$mobilnr = $_POST['mnr'];

// En student registrerar sig och läggs till i databasen.
$sql = "INSERT INTO Student(name, email, password, phoneNr)
VALUES ('$name', '$email', '$psw','$mobilnr')";


if ($connection ->query($sql)) {
  echo "Du har nu skapat en användare och kan gå tillbaka till startsidan";
  echo '<a href="startpage.php">Tillbaka till startsidan.</a>';
}
else {
  echo "try again". $sql. "<br>". $connection->error;
}
$connection->close();
?>

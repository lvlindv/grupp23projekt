<?php
include 'db_connect.php';


$name = $_POST['namn'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$mobilnr = $_POST['mnr'];

$sql = "INSERT INTO Student(name, email, password, phoneNr)
VALUES ('$name', '$email', '$psw','$mobilnr')";


if ($connection ->query($sql)) {
  echo "worked";
}
else {
  echo "try again". $sql. "<br>". $connection->error;
}
$connection->close();
?>

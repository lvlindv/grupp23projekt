<?php
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$des = $_POST['description'];
$phnr = $_POST['phoneNr'];


$sql = "INSERT INTO StudyHelper(name, email, password, description, phoneNr)
VALUES ('$name', '$email', '$psw', '$des', '$phnr')";


if ($connection ->query($sql)) {
  echo "worked";
}
else {
  echo "try again". $sql. "<br>". $connection->error;
}
$connection->close();
?>

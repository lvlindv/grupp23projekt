<?php
// Start the session
session_start();

//Koppling till databas
include 'db_connect.php';

include 'queries.php';

$name = $_POST['namn'];
$email = $_POST['email'];
$password = $_POST['psw'];
$phoneNr = $_POST['mnr'];


if (!$connection->query(checkEmail($email)))
{
  echo "Tyvärr, emailadressen finns redan registrerad!";
}
else
{
  $connection->query(addStudent($name, $email, $password, $phoneNr));
  echo "Användare sparad!";
  echo '<a href="startpage.php">Tillbaka till startsidan.</a>';


}
$connection->close();
?>

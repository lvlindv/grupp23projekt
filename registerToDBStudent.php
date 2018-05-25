<?php
// Start the session
session_start();

//Koppling till databas
include 'db_connect.php';

$name = $_POST['namn'];
$email = $_POST['email'];
$password = $_POST['psw'];
$phoneNr = $_POST['mnr'];

//Deklarerar en variabel som tar alla email från tabellen Student
  $sql_email = "SELECT * FROM Student WHERE email='$email'";
  $res_email = mysqli_query($connection, $sql_email);

if(mysqli_num_rows($res_email) > 0){
  echo "Tyvärr, emailadressen finns redan registrerad!";
}
else{
  $query = "INSERT INTO Student(name, email, password, phoneNr)
          VALUES ('$name', '$email', '$password', '$phoneNr')";
  $results = mysqli_query($connection, $query);
  echo "Användare sparad!";
  echo '<a href="startpage.php">Tillbaka till startsidan.</a>';
  exit();

}
?>

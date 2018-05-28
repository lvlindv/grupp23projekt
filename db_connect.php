
<?php
// Definerar variabler för att koppla till databasen
$uname = "root";
$pass = "root";
$host = "localhost";
$dbname = "studyHelper";
// Anropar MYSQLs connection funktion
$connection = new mysqli($host, $uname, $pass, $dbname);

if ($connection->connect_error)
{
//Avbryter kopplingen till databasen
 die ("Connection failed:".$connection.connect_error);
}
// Test för att se att databaskopplingen fungerar.
echo "";
?>

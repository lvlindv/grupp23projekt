
<?php

$uname = "root";
$pass = "root";
$host = "localhost";
$dbname = "studyHelper";

$connection = new mysqli($host, $uname, $pass, $dbname);

if ($connection->connect_error)
 {
   die ("Connection failed:".$connection.connect_error);
 }
echo "Connection worked.";

?>

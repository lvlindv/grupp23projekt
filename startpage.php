
<?php
// Start the session
session_start();

//Kopplar till databasen via db_connect.php
include "db_connect.php"



/*

if(isset($POST['btnLogin']))
{
  require 'db_connect.php';
    // Variablerna antar värdet av användarens input.
  $email = ($_POST(['email']) ? $_POST['email'] : "";
  $psw = ($_POST(['psw']) ? $_POST['psw'] : "";
  $result = mysqli_query($connection, 'SELECT * FROM Admin WHERE email="'.$email.'" AND password="'.$psw.'"');
  if(mysqli_num_rows($result)==1)
  {
    $_SESSION['email'] = $email;
    header ('Location: registerFormStudent.php');
  }
  else
    echo "Konto finns ej!";

}
*/
 ?>

<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <head>
    <script src="studybuddy.js"></script>
    <meta charset="utf-8">
    <title>Startsida</title>
  </head>

  <body>
<!--Knapp som kopplar användaren till inloggningssidan-->

<form name="loginForm" action="loginUser.php" method="post" >

  <label for="uname"><b>Epost</b></label>
  <input type="text" placeholder="Ange din E-post" name="email" >

  <label for="psw"><b>Lösenord</b></label>
  <input type="password" placeholder="Ange Lösenord" name="psw" >

  <button name="btnLogin" type="submit" value="Button" >Logga in</button>

</form>

<!--Kopplar användaren till registrera.php sidan. Jag har gjort två forms för att kunna koppla till olika actions-->
    <form name="sida2" action="registerFormStudent.php" method="post"  >
      <button name="registrera" type="submit" value="Button">Registrera</button>
    </form>
  </body>
</html>

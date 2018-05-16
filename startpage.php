
<?php
// Start the session
session_start();

//Kopplar till databasen via db_connect.php
include "db_connect.php";

 ?>

<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <head>
    <script src="functions.js"></script>
    <meta charset="utf-8">
    <title>Startsida</title>
  </head>

  <body>



<form name="loginForm" action="loginUser.php" method="post" >

  <label for="uname"><b>Epost</b></label>
  <input type="text" placeholder="Ange din E-post" name="email" >

  <label for="psw"><b>Lösenord</b></label>
  <input type="password" placeholder="Ange Lösenord" name="psw" >
<!--Knapp som kopplar användaren till loginUser.php -->
  <button name="btnLogin" type="submit" value="Button" >Logga in</button>
</br>
<!-- Knapp för om man glömt sitt lösenord -->
  <a href="a">Glömt ditt lösenord?</a>
</br>
<!-- Knapp för om man glömt sitt lösenord -->
  <a href="a">Ansök om att bli studiecoach</a>
</form>

<!--Kopplar användaren till registreraFormStudent.php sidan. -->
    <form name="btnRegister" action="registerFormStudent.php" method="post" >
      <button name="btnRegister" type="submit" value="Button">Registrera</button>
    </form>
  </body>
</html>

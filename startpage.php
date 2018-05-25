
<?php
// Start the session
session_start();

//Kopplar till databasen via db_connect.php
include "db_connect.php";

 ?>

<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Startsida</title>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="main.css">
  </head>

      <body>

      <h1>STUDIEHJÄLPEN </h1>

      <div class="loginBox">
        <img src="img/gubbe.png" class="loginImg">
        <h2>LOGGA IN</h2>

      <form name="loginForm" action="loginUser.php" method="post" onsubmit="validateLogin()">
        <div class="loginForm">
          <label for="uname"><b>E-post</b></label>
          <input type="text" placeholder="Ange din e-post..." name="email">
          <label for="psw"><b>Lösenord</b></label>
          <input type="password" placeholder="Ange ditt lösenord..." name="psw">
        </div>
        <!--Knapp som kopplar användaren till loginUser.php -->
        <button name="btnLogin" class="btnLogin" type="submit" value="Button" >Logga in</button>
      </form>

      <!--Kopplar användaren till registreraFormStudent.php sidan. -->
      <form name="btnRegister" action="registerFormStudent.php" method="post" >
        <button name="btnRegister" type="submit" class="signupbtn" value="Button">Registrera</button>
      </form>

      <!--Knapp som kopplar användaren till ett form? för att bli studycoach. (EJ I FUNKTION) -->
      <button name="btnSC" type="submit" class="studybtn" value="Button">Bli studiecoach</button>

      <!-- Referens för glömt lösenord -->
      <a href="glomtlosenord" class="forgot">Glömt ditt lösenord?</a>

    </div>
  </body>
</html>

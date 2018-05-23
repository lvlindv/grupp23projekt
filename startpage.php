
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
    <link rel="stylesheet" href="startpage.css">

  </head>

  <body>
        <p class="rubrik">STUDIEHJÄLPEN </p>
        <div class="loginbox">
        <img src="img/gubbe.png" class="gubbe">

        <h2>Logga in här</h2>
            </br>

<form name="loginForm" action="loginUser.php" method="post" >

  <label for="uname"><b>E-post</b></label>
  <input type="text" placeholder="Ange din e-post" name="email" >

  <label for="psw"><b>Lösenord</b></label>
  <input type="password" placeholder="Ange ditt lösenord" name="psw" >
  <br>
  <br>
<!--Knapp som kopplar användaren till loginUser.php -->
  <button name="btnLogin" type="submit" value="Button" >Logga in</button>


  </form>

<!--Kopplar användaren till registreraFormStudent.php sidan. -->
  <form name="btnRegister" action="registerFormStudent.php" method="post" >
    <button name="btnRegister" type="submit" value="Button">Registrera</button>
  </form>

<!--Knapp som kopplar användaren till ett form? för att bli studycoach. (EJ I FUNKTION) -->
<button name="btnSC" type="submit" value="Button">Bli Studycoach</button>
<!-- Referens för glömt lösenord -->
  <br>
  <br>
  <a href="glomtlosenord">Glömt ditt lösenord?</a>

  </body>
</html>

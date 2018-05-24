
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
      </br>
      <h2>LOGGA IN</h2>
      </br>

      <form name="loginForm" action="loginUser.php" method="post" onsubmit="validateLogin()">
      <div class="epost"> <!-- Skapar en klass ensklit för texten "E-post" för att justera designen/positionen för texten i css -->
      <label for="uname"><b>E-post</b></label>
      </div>
      <input type="text" placeholder="Ange din e-post..." name="email">

      </br>
      </br>

      <div class="passw"> <!-- Skapar en klass ensklit för texten "E-post" för att justera designen/positionen för texten i css -->
      <label for="psw"><b>Lösenord</b></label>
      </div>
      <input type="password" placeholder="Ange ditt lösenord..." name="psw">

      </br>
      </br>

      <!--Knapp som kopplar användaren till loginUser.php -->
      <button name="btnLogin" type="submit" class="loginbtn" value="Button" >Logga in</button>


      </form>

      <!--Kopplar användaren till registreraFormStudent.php sidan. -->
      <form name="btnRegister" action="registerFormStudent.php" method="post" >
        <button name="btnRegister" type="submit" class="signupbtn" value="Button">Registrera</button>
      </form>

      <!--Knapp som kopplar användaren till ett form? för att bli studycoach. (EJ I FUNKTION) -->
      <button name="btnSC" type="submit" class="studybtn" value="Button">Bli studiecoach</button>


      </br>
      </br>
      <!-- Referens för glömt lösenord -->
      <a href="glomtlosenord" class="forgot">Glömt ditt lösenord?</a>

    </div>
  </body>
</html>

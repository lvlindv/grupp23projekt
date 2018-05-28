
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

      <div class="box">
        <div class="divLoginImg">
          <img src="img/gubbe.png" class="loginImg">
        </div>
        <h2>LOGGA IN</h2>

      <form name="loginForm" action="loginUser.php" method="post" onsubmit="return validateLogin()">
        <div class="loginForm">
          <label for="uname" class="boxLabel"><b>E-post</b></label>
          <input type="text" class="boxInput" placeholder="Ange din e-post..." name="email">
          <label for="psw" class="boxLabel"><b>Lösenord</b></label>
          <input type="password" class="boxInput" placeholder="Ange ditt lösenord..." name="psw">
        </div>
          <!--Knapp som kopplar användaren till loginUser.php -->
          <button name="btnLogin" class="btnLogin" type="submit" value="Button" >Logga in</button>
      </form>
      <!--Kopplar användaren till registreraFormStudent.php sidan. -->
      <form name="btnRegister" action="registerFormStudent.php" method="post" >
        <button name="btnRegister" type="submit" class="btnRegister" value="Button">Registrera</button>
      </form>
      <!--Knapp som kopplar användaren till ett form? för att bli studycoach. (EJ I FUNKTION) -->
      <button name="btnStudyCoach" type="submit" class="btnSignup" value="Button">Bli studiecoach</button>

      <div class="divBoxLink">
        <!-- Referens för glömt lösenord -->
        <a href="startpage.php" class="boxLink">Glömt ditt lösenord?</a>

      </div>



    </div>

    <div class="banners">
    <a href="https://www.halebop.se/"><img src="hale.jpg" alt="halebop" class="halebop"></a>
    <a href="https://www.studentbokhandeln.se/"><img src="Beg.jpg" alt="studentbokhandeln" class="studentbokhandeln"></a>
    </div>

  </body>
</html>

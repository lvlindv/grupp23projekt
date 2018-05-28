
<?php
// Startar sessionen
session_start();

// Kopplar till databasen via db_connect.php
include "db_connect.php";
?>

<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Startsida</title>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="startpage.css">
  </head>
      <body>
      <!-- Rubrik -->
      <h1>STUDIEHJÄLPEN </h1>

      <!-- Inloggningsruta och reklambanners -->
      <div class="content">
        <!-- Ruta för inloggning m.m. -->
        <div class="box">
          <div class="divLoginImg">
            <img src="img/gubbe.png" class="loginImg">
          </div>
          <h2>LOGGA IN</h2>
          <!-- Inloggningsformulär -->
          <form name="loginForm" action="loginUser.php" method="post" onsubmit="return validateLogin()">
            <div class="loginForm">
              <label for="uname" class="boxLabel"><b>E-post</b></label>
              <input type="text" class="boxInput" placeholder="Ange din e-post..." name="email">
              <label for="psw" class="boxLabel"><b>Lösenord</b></label>
              <input type="password" class="boxInput" placeholder="Ange ditt lösenord..." name="psw">
            </div>
            <!-- Knapp som kopplar användaren till loginUser.php -->
            <button name="btnLogin" class="btnLogin" type="submit" value="Button" >Logga in</button>
          </form>
          <!-- Kopplar användaren till registreraFormStudent.php sidan. -->
          <button name="btnRegister" onclick="location.href='registerFormStudent.php';" class="btnRegister">Registrera dig</button>
          <!-- (EJ I FUNKTION) Knapp som kopplar användaren till ett form för att ansöka om att bli studycoach. -->
          <button name="btnStudyCoach" class="btnSignup">Bli studiecoach</button>
          <div class="divBoxLink">
            <!-- Referens för glömt lösenord -->
            <a href="startpage.php" class="boxLink">Glömt ditt lösenord?</a>
             <a href="startpage.php" class="boxLink">  Kontakta oss</a>
          </div>
      </div>
      <div class="banners">
        <div class"divHalebop">
          <!-- "Reklambanner" till Halebop som öppnas i ny flik -->
          <a target="_blank" href="https://www.halebop.se/"><img src="img/halebop.jpg" class="halebop"></a>
        </div>
        <div class="divStudentbokhandeln">
          <!-- "Reklambanner" till Studentbokhandeln som öppnas i ny flik -->
          <a target="_blank" href="https://www.studentbokhandeln.se/"><img src="img/studentbokhandeln.jpg" class="studentbokhandeln"></a>
        </div>
      </div>
    </div>
  </body>
</html>

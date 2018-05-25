<?php
  //Koppling till databas
  include ('db_connect.php')
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--Koppling till javascript-fil-->
    <script src="functions.js"></script>
    <!-- Koppling till css-fil -->
    <link rel="stylesheet" href="main.css">
    <title>Registrering</title>
  </head>

   <body>
     <h1>STUDIEHJÄLPEN </h1>
      <div class="box">

      <h2>REGISTRERA DIG</h2>

      <!--Formulär för användarregistrering-->
      <form name="regForm" action="registerToDBStudent.php" method="post" onsubmit="return validateReg()" >
       <div class="loginForm">
          <label class="boxLabel" for="namn"><b>Ditt fullständiga namn</b></label>
          <input class="boxInput" type="text" placeholder="Skriv in ditt namn..." name="namn" >

          <label class="boxLabel" for="email"><b>Email</b></label>
          <input class="boxInput" type="text" placeholder="Skriv in din email..." name="email" >

          <label class="boxLabel" for="mnr"><b>Mobilnummer</b></label>
          <input class="boxInput" type="text" placeholder="Skriv in ditt mobilnummer..." name="mnr" >

          <label class="boxLabel" for="psw"><b>Lösenord</b></label>
          <input class="boxInput" type="password" placeholder="Välj ett lösenord..." name="psw" >
      </div>
      <!--Knapp för registrering som skickar vidare användaren till mina sidor-->
      <button type="submit" class="btnRegister">Registrera dig</button>

      <!--Knapp för att avbryta registrering OBS! LÄGG TILL KOPPLING TILLBAKA TILL STARTSIDA-->
      <button type="button" class="btnSignup">Avbryt</button>

      <div class="divBoxLink">
        <p><b>Godkänn våra <a class="boxLink" href="#">användarvillkor</a></b></p>
        <input type="checkbox" name="Godkänn">
      </div>

      </div>

    </form>
  </body>
</html>

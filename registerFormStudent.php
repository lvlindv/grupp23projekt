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
    <link rel="stylesheet" href="registerPage.css">
    <title>Registrering</title>
    </head>

      <body>

      <p class="rubrik">STUDIEHJÄLPEN </p>
      <div class="loginbox">
      <img src="img/gubbe.png" class="gubbe">
      <!--Formulär för användarregistrering-->
      <form name="regForm" action="registerToDBStudent.php" method="post" onsubmit="return validateReg()" >

      <!--Titel och brödtext-->
      <h1>REGISTRERA DIG</h1>
      <!-- <p>Fyll i formuläret för att skapa en användare.</p> Behöver vi denna? -->
      </br>
      </br>
      </br>
      <!--Label och inputbox för namn-->
      <div class="name">
      <label for="namn"><b>Ditt fullständiga namn</b></label>
      </div>
      <input type="text" placeholder="Skriv in ditt namn..." name="namn" >

      <!--Label och inputbox för e-post-->
      <div class="email">
      <label for="email"><b>Email</b></label>
      </div>
      <input type="text" placeholder="Skriv in din email..." name="email" >

      <!--Label och inputbox för mobilnummer-->
      <div class="mobnr">
      <label for="mnr"><b>Mobilnummer</b></label>
      </div>
      <input type="text" placeholder="Skriv in ditt mobilnummer..." name="mnr" >

      <!--Label och inputbox för lösenord-->
      <div class="passw">
      <label for="psw"><b>Lösenord</b></label>
      </div>
      <input type="password" placeholder="Välj ett lösenord..." name="psw" >

      <!--Knapp för registrering som skickar vidare användaren till mina sidor-->
      <button type="submit" class="regbtn">Registrera dig</button>

      <!--Knapp för att avbryta registrering OBS! LÄGG TILL KOPPLING TILLBAKA TILL STARTSIDA-->
      <button type="button" class="canclebtn">Avbryt</button>

      <div class="godkann">
      <b><p>Godkänn våra <a href="#">användarvillkor</a></b>
      <input type="checkbox" name="Godkänn"</p>
      </div>
      </div>
    </form>
  </body>
</html>

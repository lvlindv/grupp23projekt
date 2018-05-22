<?php
  //Koppling till databas
  include "db_connect.php"
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--Koppling till javascript-fil-->
    <script src="functions.js"></script>
    <title>Registrering</title>
  </head>
  <body>

<!--Formulär för användarregistrering-->
    <form name="registrationForm" action="registerToDBStudent.php" method="post" onsubmit="return validateregistration()" >

      <!--Titel och brödtext-->
      <h1>Registrera dig </h1>
      <p>Fyll i formuläret för att skapa en användare.</p>

      <!--Label och inputbox för namn-->
      <label for="namn"><b>Ditt fullständiga namn</b></label>
      <input type="text" placeholder="Skriv in ditt namn" name="namn" >

      <!--Label och inputbox för e-post-->
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Skriv in Email" name="email" >

      <!--Label och inputbox för mobilnummer-->
      <label for="mnr"><b>Mobilnummer</b></label>
      <input type="text" placeholder="Skriv in ditt mobilnummer" name="mnr" >

      <!--Label och inputbox för lösenord-->
      <label for="psw"><b>Lösenord</b></label>
      <input type="password" placeholder="Välj ett lösenord" name="psw" >

      <!--Label och inputbox för upprepning av lösenord-->
      <label for="psw-repeat"><b>Upprepa lösenord</b></label>
      <input type="password" placeholder="Upprepa lösenord" name="psw-repeat" >

      <!--Knapp för att avbryta registrering OBS! LÄGG TILL KOPPLING TILLBAKA TILL STARTSIDA-->
      <button type="button" >Avbryt</button>
      <!--Knapp för registrering som skickar vidare användaren till mina sidor-->
      <button type="submit" >Registrera dig</button>


    </form>
  </body>
</html>

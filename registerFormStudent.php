<?php
  // Koppling till databas
  include ('db_connect.php')
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Koppling till javascript-fil -->
    <script src="functions.js"></script>
    <!-- Koppling till css-fil -->
    <link rel="stylesheet" href="main.css">
    <title>Registrering</title>
  </head>

   <body>
     <h1>STUDIEHJÄLPEN </h1>
      <div class="box">
      <div class="boxTitle">
      <h2>REGISTRERA DIG</h2>
      </div>


      <!-- Formulär för användarregistrering -->
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
      <!-- Checkbox och "länk" för att godkänna användaravtal -->
      <div class="agreeTerms">
        <input class="boxCheckbox" type="checkbox" name="Godkänn">
        <p class="userTermsText"><b>Godkänn våra <a class="userTermsLink" href="registerFormStudent">användarvillkor</a></b></p>
      </div>

      <!-- Knapp för registrering av användare i databasen -->
      <button type="submit" class="btnCreateUser">Registrera dig</button>

      <!-- Knapp för att avbryta registrering -->
      <button type="button" class="btnCancel" onclick="location.href='startpage.php';">Avbryt</button>

      </div>

    </form>
  </body>
</html>

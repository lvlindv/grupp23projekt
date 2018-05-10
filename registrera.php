<html>

  <?php include "db_connect.php" ?> <!--include refererar till page db_connect.php, som i sin tur kopplar oss till databasen. -->
  <body>

    <form name="registrationform" action="minasidor.php" method="post" onsubmit="return validateRegistration()" >

      <h1>Registrera dig NUUUUUUUUUUUU</h1>
      <p>Fyll i formuläret för att skapa en användare.</p>

      <label for="namn"><b>Ditt fullständiga namn</b></label>
      <input type="text" placeholder="Skriv in ditt namn" name="namn" >

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Skriv in Email" name="email" >

      <label for="mnr"><b>Mobilnummer</b></label>
      <input type="text" placeholder="Skriv in ditt mobilnummer" name="mnr" >

      <label for="psw"><b>Lösenord</b></label>
      <input type="password" placeholder="Välj ett lösenord" name="psw" >

      <label for="psw-repeat"><b>Upprepa lösenord</b></label>
      <input type="password" placeholder="Upprepa lösenord" name="psw-repeat" >


      <button type="button" >Avbryt</button>
      <button type="submit" >Registrera dig</button>



    </form>
  </body>
</html>

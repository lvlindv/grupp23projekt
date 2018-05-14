<!--Kopplar till databasen via db_connect.php-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Startsida</title>
  </head>

<?php include "db_connect.php" ?>
  <body>

<!--Knapp som kopplar användaren till inloggningssidan-->
    <form name="sida1" action="loggin.php" method="post" >
      <button name="loggaIn" type="submit" value="Button" >Logga in</button>
    </form>

<!--Kopplar användaren till registrera.php sidan. Jag har gjort två forms för att kunna koppla till olika actions-->
    <form name="sida2" action="registrera.php" method="post"  >
      <button name="registrera" type="submit" value="Button">Registrera</button>
    </form>
  </body>
</html>

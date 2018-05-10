<!--Kopplar till databasen via db_connect.php-->
<html>
<?php include "db_connect.php" ?>
  <body>

<!--Knapp som kopplar användaren till inloggningssidan-->
    <form name="sida1" action="/studybuddy/loggin.php" method="get" >
      <button name="loggaIn" type="submit" value="Button" >Logga in</button>
    </form>

<!--Kopplar användaren till registrera.php sidan. Jag har gjort två forms för att kunna koppla till olika actions-->
    <form name="sida2" action="/studybuddy/registrera.php" method="get"  >
      <button name="registrera" type="submit" value="Button">Registrera</button>
    </form>
  </body>
</html>
<!--test-->

<?php
  // Start the session
  session_start();

  //Koppling till databas
  include "db_connect.php";
  //Fil med sql-queries
  include "queries.php";
  //Fil som skapar dropdown listor och tabeller baserat på data från db
  include "htmlgenerator.php";
?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Startsida StudieCoach</title>
    <!--Kopplar till js-fil-->
    <script src="functions.js"></script>
  </head>
    <body>
      <!-- Rubrik med inloggade studiecoachens namn-->
      <h1> <?php echo "Välkommen ".$_SESSION["name"]."!"; ?> </h1>
      <!--underrubrik-->
      <h2> Dina bokningar </h2>
      <!-- Ruta med bokningar-->
      <section class="myBookings">
        <?php
          // Lagrar resultat från query som hämtar studiecoachens bokningar och matar ut varje bokning
          $resultBookings = $connection->query($queryCoachBookings);
          while ($row = $resultBookings->fetch_assoc())
          {
            // Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
            // samt studentens namn och kontaktuppgifter
            include "showBookings.php";
          }
        ?>
      </section>
      <!--underrubrik-->
      <h2> Lägg till tillgängliga tider </h2>
      <form action="addAvailability.php" method="POST">
        <!--Label för dropdown med dagar-->
        <label for="dayDropdown"><b>Välj dag</b></label>
          <select name="dayName">
            <option value="Måndag">Måndag</option>
            <option value="Tisdag">Tisdag</option>
            <option value="Onsdag">Onsdag</option>
            <option value="Torsdag">Torsdag</option>
            <option value="Fredag">Fredag</option>
          </select>
        <!--Knapp för att lägga till tillgänglighet-->
        <input type="submit" value="Lägg till" name="btnAdd"/>
      </form>
    <?php
    // Länk för att logga ut användare
    echo '<a href="logoutUser.php">Logga ut</a>';
     ?>
  </body>
</html>

<?php
  // Startar sessionen
  session_start();

  //Koppling till databas
  include "db_connect.php";
  //Fil med sql-queries
  include "queries.php";
  // Koppling till fil med funktioner
  include "functions.php";

  // Kollar om studiecoach är inloggad
  loggedInAsStudyCoach();

  if (isset($_GET["msg"])) {
    switch ($_GET["msg"]) {
      case 'alreadyAvailable':
        echo "<script type='text/javascript'>alert('Du har redan angett att du är tillgänglig den dagen.')</script>";
        break;

      case 'felmeddelande':
        echo "<script type='text/javascript'>alert('Något gick fel. Försök igen.')</script>";
        break;

      default:
        break;
    }
  }
?>
<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Startsida StudieCoach</title>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="userStartPage.css">
  </head>

<body>
  <div class="logout"> <!--loggaut högst upp till höger-->
    <button onclick="location.href='logoutUser.php';">Logga ut</button>
  </div>
  <h1> <?php echo "Välkommen ".$_SESSION["name"]."!"; ?> </h1><!--Rubrik med studiecoachens email-->



<!-- <div class="formBookings"> class för "dina bokningar" finns i admin.css-->
  <h2> Dina bokningar </h2><!--underrubrik-->


  <section class="myBookings"><!--ruta med bokningar-->
    <?php
      //Lagrar resultat från query som hämtar studiecoachens bokningar och matar ut varje bokning
      $resultBookings = $connection->query(showCoachBookings($_SESSION['coachEmail']));
      while ($row = $resultBookings->fetch_assoc())
      {
        //Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
        //samt studentens namn och kontaktuppgifter
        include "showBookingsStudyCoach.php";
      }
    ?>
  </section>


 <!-- <div class="formDay"> klass för alla dagarna i rulllistan, formet finns i admin.css-->
  <h2> Lägg till tillgängliga tider </h2><!--underrubrik-->
  <form action="addAvailability.php" method="POST">
    <!--rubrik för alla dagar-->
    <label for="dayDropdown"><b>Välj dag</b></label><!--Label för dropdown med dagar-->
    <!-- Dropdown-lista med vardagar -->
    <select name="dayName">
      <option value="Måndag">Måndag</option>
      <option value="Tisdag">Tisdag</option>
      <option value="Onsdag">Onsdag</option>
      <option value="Torsdag">Torsdag</option>
      <option value="Fredag">Fredag</option>
    </select>
    <!-- Knapp för att lägga till tillgänglighet -->
    <button class="addDay" type="submit" name="btnAdd">Lägg till</button>

    </form>



</body>
</html>

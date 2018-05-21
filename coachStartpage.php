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
    <script src="functions.js"></script>
  </head>

<body>
  <h1> <?php echo "Välkommen ".$_SESSION["name"]."!"; ?> </h1><!--Rubrik med studiecoachens email-->

  <h2> Dina bokningar </h2><!--underrubrik-->
  <section class="myBookings"><!--ruta med bokningar-->
    <?php
      //Lagrar resultat från query som hämtar studiecoachens bokningar och matar ut varje bokning
      $resultBookings = $connection->query($queryCoachBookings);
      while ($row = $resultBookings->fetch_assoc())
      {
    ?>
        <!--Matar ut bokningens dag, ämne, coachens namn och kontaktuppgifter
            samt studentens namn och kontaktuppgifter-->
        <div class="booking">
          <div class="bookingDay">
            <?php
            echo $row["day"];
            ?>
          </div>

          <div class="bookingSubject">
            <?php
            echo $row["subject"];
            ?>
          </div>

          <div class="coachName">
            <?php
            echo $row["coachName"];
            ?>
          </div>

          <div class="coachNr">
            <?php
            echo $row["coachNr"];
            ?>
          </div>

          <div class="coachEmail">
            <?php
            echo $row["coachEmail"];
            ?>
          </div>

          <div class="studentName">
            <?php
            echo $row["studentName"];
            ?>
          </div>

          <div class="studentNr">
            <?php
            echo $row["studentNr"];
            ?>
          </div>

          <div class="studentEmail">
            <?php
            echo $row["studentEmail"];

            echo "<br />";
            ?>
          </div>
        </div>
    <?php
      }
    ?>
  </section>

  <h2> Lägg till tillgängliga tider </h2><!--underrubrik-->
  <form action="addAvailability.php" method="POST">
    <label for="dayDropdown"><b>Välj dag</b></label><!--Label för dropdown med dagar-->
    <select name="dayName">
      <option value="Måndag">Måndag</option>
      <option value="Tisdag">Tisdag</option>
      <option value="Onsdag">Onsdag</option>
      <option value="Torsdag">Torsdag</option>
      <option value="Fredag">Fredag</option>
      <option value="Lördag">Lördag</option>
      <option value="Söndag">Söndag</option>
    </select>

    <input type="submit" value="Lägg till" name="btnAdd"/><!--Knapp för att lägga till tillgänglighet-->
  </form>
    <?php
    if(isset($_POST['btnAdd']))
    {
      // Lagrar vald dag i sessionvariabeln
      $_SESSION['selected_day'] = $_POST['dayName'];
    }
    //Länk för att logga ut användare
    echo '<a href="logoutUser.php">Logga ut</a>';
     ?>
</body>
</html>

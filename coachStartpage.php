<?php
// Start the session
session_start();

  include "db_connect.php";
  include "queries.php";
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
  <h1> <?php echo "Välkommen ".$_SESSION["email"]; ?> </h1>

  <h2> Dina bokningar </h2><!--underrubrik-->
  <section class="myBookings"><!--ruta med bokningar-->
    <?php
      $resultBookings = $connection->query($queryCoachBookings);
      while ($row = $resultBookings->fetch_assoc())
      {
    ?>
        <!--Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
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

  <h2> Lägg till tillgängliga tider </h2>
  <form action="addAvailability.php" method="POST">
    <label for="dayDropdown"><b>Välj dag</b></label><!--Rubrik-->
    <?php
      $resultDays = $connection->query($queryShowDays);
      make_select_from_result("name", $resultDays );
    ?>
      <input type="submit" value="Lägg till" />
    </form>

    <?php
    echo '<a href="logoutUser.php">Logga ut</a>';
     ?>
</body>
</html>

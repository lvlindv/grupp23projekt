<?php
  // Start the session
  session_start();

  //Koppling till databas
  include "db_connect.php";

  //Koppling till fil med queries
  include "queries.php";

  //Koppling till fil som skapar dropdowns och tabeller från data i db
  include "htmlgenerator.php";
?>
<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1" />
    <title>Startsida</title>
  </head>

  <body>
    <h1> <?php echo "Välkommen ".$_SESSION["name"]."!" ?> </h1>

    <h2> Dina bokningar </h2><!--underrubrik-->
    <section class="myBookings"><!--ruta med bokningar-->
      <?php
        $resultBookings = $connection->query($queryStudentBookings);
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

    <h2> Boka ny tid </h2>
    <form action="search.php" method="POST">
      <label for="dayDropdown"><b>Välj dag</b></label><!--Rubrik-->
      <select name="dayName">
        <option value="Måndag">Måndag</option>
        <option value="Tisdag">Tisdag</option>
        <option value="Onsdag">Onsdag</option>
        <option value="Torsdag">Torsdag</option>
        <option value="Fredag">Fredag</option>
      </select>


      <label for="subjectDropdown"><b>Välj ämne</b></label><!--rubrik-->
          <?php
            $resultSubjects = $connection->query($queryShowSubjects);
            make_select_from_result("name", $resultSubjects);
          ?>

        <input type="submit" value="Sök" name="btnSearch"/>
    </form>

    <?php
      echo '<a href="logoutUser.php">Logga ut</a>';
    ?>
  </body>
</html>

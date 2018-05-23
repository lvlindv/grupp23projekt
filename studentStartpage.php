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
    <!--Rubrik med användarens namn-->
    <h1> <?php echo "Välkommen ".$_SESSION["name"]."!" ?> </h1>
    <!--Underrubrik-->
    <h2> Dina bokningar </h2>
    <!--Ruta med bokningar-->
    <section class="myBookings">
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
    <!--Formulär för bokning av stydiehjälp-->
    <h2> Boka ny tid </h2>
    <!--Kopplar tillbaka till startsidan vid sökning-->
    <form action="studentStartpage.php" method="POST">
      <!--Rubrik-->
      <label for="dayDropdown"><b>Välj dag</b></label>
      <!--Dropdown-lista med vardagar-->
      <select name="dayName">
        <option value="Måndag">Måndag</option>
        <option value="Tisdag">Tisdag</option>
        <option value="Onsdag">Onsdag</option>
        <option value="Torsdag">Torsdag</option>
        <option value="Fredag">Fredag</option>
      </select>

      <!--Rubrik-->
      <label for="subjectDropdown"><b>Välj ämne</b></label>
          <?php
            //Dropdown-lista med ämnen hämtade från databasen
            $resultSubjects = $connection->query($queryShowSubjects);
            make_select_from_result("name", $resultSubjects);
          ?>
        <!--Sök-knapp-->
        <input type="submit" value="Sök" name="btnSearch"/>
    </form>

    <?php
      //Om användaren trycker på sök-knappen
      if(isset($_POST['btnSearch']))
      {
        // Lagrar vald dag i sessionvariabeln
        $_SESSION['selectedDay'] = $_POST['dayName'];
        // Lagrar valt ämne i sessionvariabeln
        $_SESSION['selectedSubject'] = $_POST['name'];
      }

      //Lagrar värdena av sessionvariablerna i nya varibler som ska sättas in i query
      $selectedDay = $_SESSION['selectedDay'];
      $selectedSubject = $_SESSION['selectedSubject'];

      //SQL-query som hämtar tillgängliga studiecoacher
      $queryAvailableCoaches = "SELECT StudyCoach.name, StudyCoach.description
                                  FROM StudyCoach
                                  INNER JOIN CoachSubjects ON CoachSubjects.coachId=StudyCoach.coachId
                                  INNER JOIN Availability ON Availability.coachId=StudyCoach.coachId
                                  WHERE Availability.day='$selectedDay' AND CoachSubjects.subjectName='$selectedSubject'";

      //Lagrar queryresultat i en sessionsvariabel
      $_SESSION['resultAvailability'] = $connection->query($queryAvailableCoaches);

      ?>

      <label for="resultAvailability"><b><?php
      echo "Tillgängliga coacher för den valda dagen ".$selectedDay." och det valda ämnet ".$selectedSubject.":"
      ?></b></label>
      <br><br>

      <?php

      //Om query inte resulterar i några rader så finns ingen tillgänglig coach
      if(mysqli_num_rows($_SESSION['resultAvailability'])<1)
      {
        echo "Det finns inga tillgängliga studiecoacher för den valda dagen/ämnet. Vänligen gör om din sökning.";
      }
      //Annars matas resultatet ut i tabellform
      else
      {
        ?>
          <table><tr><th>Namn</th><th>Beskrivning</th></tr>

        <?php
          while ($row = $_SESSION['resultAvailability']->fetch_assoc())
          {
        ?>
            <tr>
              <td><?php echo $row["name"] ?></td>
              <td><?php echo $row["description"] ?></td>
              <td>
                <form action="booking.php" method="post">
                  <input type="submit" value="Boka" name="btnBook">
                </form>
              </td>
            </tr>
        <?php
          }
        ?>
        </table>
        <?php
      }

      //Länk för att logga ut användaren
      echo "<br/><br/>";
      echo '<a href="logoutUser.php">Logga ut</a>';
    ?>
  </body>
</html>

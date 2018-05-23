<?php
  // Start the session
  session_start();

  //Koppling till databas
  include "db_connect.php";

  //Koppling till fil med queries
  include "queries.php";

  //Koppling till fil som skapar dropdowns och tabeller från data i db
  include "htmlgenerator.php";

  echo $_SESSION["studentId"];
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
        // Lagrar vald dag i variabel
        $_SESSION["selectedDay"] = $_POST['dayName'];
        // Lagrar valt ämne i variabel
        $_SESSION["selectedSubject"] = $_POST['name'];
      }

      //Lagrar sessionvariabler i nya variabler för att lägga in i query
      $selectedDay = $_SESSION["selectedDay"];
      $selectedSubject = $_SESSION["selectedSubject"];

      //Hämtar tillgängliga studiecoacher genom funktion i queries.php och lagrar resultat i variabel
      $resultAvailability = $connection->query(availableCoaches($selectedDay, $selectedSubject));

      ?>

      <label for="resultAvailability"><b>
        <?php
        echo "Tillgängliga coacher för den valda dagen ".$selectedDay." och det valda ämnet ".$selectedSubject.":"
        ?>
      </b></label>
      <br><br>

      <?php

      //Om query inte resulterar i några rader så finns ingen tillgänglig coach
      if(mysqli_num_rows($resultAvailability)<1)
      {
        echo "Det finns inga tillgängliga studiecoacher för den valda dagen/ämnet. Vänligen gör om din sökning.";
      }
      //Annars matas resultatet ut i tabellform
      else
      {
      ?>
        <!--Tabell med tillgängliga studiecoacher-->
        <table>
          <!--Tabellrubriker i fetstilt-->
          <tr>
            <th>Namn</th>
            <th>Beskrivning</th>
          </tr>
          <?php
            //Matar ut resultatet från queryn ovan
            while ($row = $resultAvailability->fetch_assoc())
            {

          ?>
              <!--Namn och beskrivning för varje tillgänglig coach matas ut på ny rad-->
              <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td>
                  <!--Knapp för bokning som kopplar till booking.php-->
                  <form action="booking.php" method="post">
                    <input type="hidden" value="<?php echo $row['coachId'] ?>" name="coachId">
                    <input type="submit" value="Boka" name="btnBook">
                  </form>
                </td>
              </tr>
          <?php
            }
          ?>
          <!--Slut på tabell-->
          </table>
    <?php
      }

      //Länk för att logga ut användaren
      echo "<br/><br/>";
      echo '<a href="logoutUser.php">Logga ut</a>';
    ?>
  </body>
</html>

<?php
  // Startar sessionen
  session_start();

  // Koppling till databas
  include "db_connect.php";

  // Koppling till fil med queries
  include "queries.php";

  // Koppling till fil med funktioner
  include "functions.php";

  // Kollar om student är inloggad
  loggedInAsStudent();

  if (isset($_GET["msg"])) {
    switch ($_GET["msg"]) {
      case 'bokningfinns':
        echo "<script type='text/javascript'>alert('Du har redan studiehjälp bokat på den valda dagen.')</script>";
        break;

      case 'nybokning':
        echo "<script type='text/javascript'>alert('Du har lagt till en ny bokning!')</script>";
        break;

      case 'felmeddelande':
        echo "<script type='text/javascript'>alert('Något gick fel. Försök igen.')</script>";
        break;

      default:
        break;
    }
  }
?>
<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>Startsida</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="admin.css">
  </head>

  <body>
    <div class="loggOut"> <!--loggaut högst upp till höger-->
    <button href="logoutUser.php">Logga ut</button>
    </div>
    <!-- Rubrik med användarens namn -->
    <h1> <?php echo "Välkommen ".$_SESSION["name"]."!" ?> </h1>
    <!-- Underrubrik -->
    <h2> Dina bokningar </h2>
    <!-- Ruta med bokningar -->
    <section class="myBookings">
      <?php
        // Hämtar studentens bokningar från databasen
        $resultBookings = $connection->query(showStudentBookings($_SESSION['studentEmail']));
        while ($row = $resultBookings->fetch_assoc())
        {
          // Skriver ut bokningens dag, ämne, coachens namn och kontaktuppgifter
          // samt studentens namn och kontaktuppgifter
          include "showBookingsStudent.php";
        }
      ?>
    </section>
    <!-- Formulär för bokning av stydiehjälp -->
    <div class="newBooking">
<div class="bookDaySubject">

    <h2> Boka ny tid </h2>
    <!-- Kopplar tillbaka till startsidan vid sökning -->
    <form action="studentStartpage.php" method="POST">
      <!-- Rubrik -->
      <label for="dayDropdown"><b>Välj dag</b></label>
      <!-- Dropdown-lista med vardagar -->
      <select name="dayName">
        <option value="Måndag">Måndag</option>
        <option value="Tisdag">Tisdag</option>
        <option value="Onsdag">Onsdag</option>
        <option value="Torsdag">Torsdag</option>
        <option value="Fredag">Fredag</option>
      </select>

      <!-- Rubrik -->
      <label for="subjectDropdown"><b>Välj ämne</b></label>
          <?php
            // Dropdown-lista med ämnen hämtade från databasen
            $resultSubjects = $connection->query(showSubjects());
            makeDropdownFromResult("name", $resultSubjects);
          ?>
        <!-- Sök-knapp -->
        <button type="submit" value="Sök" name="btnSearch">Sök </button>
    </form>
</div>
    <?php
      // Hämtar tillgängliga studiecoacher
      include "availableCoaches.php";
    ?>

      <!-- Skriver ut tillgängliga studiecoacher -->
      <label for="resultAvailability"><b>
        <?php
        echo "Tillgängliga coacher för den valda dagen ".$selectedDay." och det valda ämnet ".$selectedSubject.":";
        ?>
      </b></label>

      <?php

      // Om query inte resulterar i några rader så finns ingen tillgänglig coach
      if(mysqli_num_rows($resultAvailability)<1)
      {
        echo "Det finns inga tillgängliga studiecoacher för den valda dagen/ämnet. Vänligen gör om din sökning.";
      }
      //Annars matas resultatet ut i tabellform
      else
      {
      ?>
        <!-- Tabell med tillgängliga studiecoacher -->
        <table>
          <!-- Tabellrubriker i fetstilt -->
          <tr>

            <th>Namn</th>
            <th>Beskrivning</th>
            <th></th>
          </tr>
          <?php
            // Matar ut resultatet från queryn ovan
            while ($row = $resultAvailability->fetch_assoc())
            {
          ?>
              <!-- Form med tabell över tillgängliga studiecoacher -->
              <!-- Namn och beskrivning för varje tillgänglig coach matas ut på ny rad -->
              <tr>
                <!-- Skickar med den valda studiecoachens ID till booking.php -->

                <!-- Skriver ut den valda coachens namn och beskrivning -->
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <!-- Knapp för bokning som kopplar till booking.php -->
              <td><button class="btnBook" onclick="location.href='booking.php?coachId=<?php echo $row["coachId"]; ?>';">Boka</button></td>
              </tr>
          <?php
            }
          ?>
          <!-- Slut på tabell -->
          </table>
          <?php
            }
          ?>

        </div>

  </body>
</html>

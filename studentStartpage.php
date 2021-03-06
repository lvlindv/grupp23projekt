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

  if (isset($_GET["msg"]))
  {
    switch ($_GET["msg"])
    {
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
    <link rel="stylesheet" href="userStartPage.css">
  </head>

  <body>
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

    <!-- Ruta för sökning och bokning av studiecoacher -->
    <div class="boxNewBookings">
      <!-- Formulär för bokning av studiehjälp -->
      <h2> Boka ny tid </h2>
      <div class="newBooking">
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
          <button class="btnSearch" type="submit" value="Sök" name="btnSearch">Sök </button>
        </form>
        <?php
          // Hämtar tillgängliga studiecoacher
          include "availableCoaches.php";
        ?>
        <!-- Skriver ut tillgängliga studiecoacher -->
        <div class="resultAvailability">
        <label for="resultAvailability"><b>
          <?php
          echo "Tillgängliga coacher för den valda dagen ".$selectedDay." och det valda ämnet ".$selectedSubject.":";
          ?>
        </b></label>
        </div>
      </div>
      <?php

      // Om query inte resulterar i några rader så finns ingen tillgänglig coach
      if(mysqli_num_rows($resultAvailability)<1)
      {
        echo '<p class="noAvailability">Det finns inga tillgängliga studiecoacher för den valda dagen/ämnet. Vänligen gör om din sökning.</p>';
      }
      //Annars matas resultatet ut i tabellform
      else
      {
      ?>
        <!-- Tabell med tillgängliga studiecoacher -->
        <table class="availableCoachesTable">
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
              <div class="descriptionStudyCoach">
                <td><?php echo $row['description'] ?></td>
              </div>
              <!-- Knapp för bokning som kopplar till booking.php -->
              <td><div class="btnBook"><button onclick="location.href='booking.php?coachId=<?php echo $row["coachId"]; ?>';">Boka</button></div></td>
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
    <!-- Knapp för att logga ut användare -->
    <div class="logoutBtn">
      <button onclick="location.href='logoutUser.php';">Logga ut</button>
    </div>
  </body>
</html>

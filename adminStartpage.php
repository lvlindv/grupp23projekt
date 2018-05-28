<?php
// Start the session
session_start();

// Koppling till databas
include "db_connect.php";

// Koppling till fil med queries
include "queries.php";

// Koppling till fil med funktioner
include "functions.php";

// Kollar om användare är inloggad som admin
loggedInAsAdmin();

?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <!-- Koppling till js-fil med validering -->
    <meta charset="utf-8">
    <title>Startsida</title>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="userStartPage.css">
  </head>
      <body>
        <!-- Knapp för att logga ut användare -->
        <div class="logout">
          <button onclick="location.href='logoutUser.php';">Logga ut</button>
        </div>
        <!-- Visar den inloggade admins e-postadress-->
        <h1> <?php echo "Välkommen ".$_SESSION["adminEmail"]."!"; ?>  </h1>

        <div class="formRegisterCoach">
        <div class="boxTitle">
        <h2> Registrera en ny studiecoach </h2>
        </div>
        <!-- Ett formulär för att lägga till nya studiecoacher-->
        <form name="regHelper" action="registerToDBCoach.php" method="post" onsubmit="return validateStudyCoach()">

          <label for="name" class="boxLabel"><b>Fullständigt namn</b></label>
          <input type="text" class="boxInput" placeholder="Ange fullständigt namn på StudyCoachen" name="name">

          <label for="email" class="boxLabel"><b>E-post</b></label>
          <input type="text" class="boxInput" placeholder="Ange epost" name="email" >

          <label for="phoneNr" class="boxLabel"><b>Mobilnummer</b></label>
          <input type="text" class="boxInput" placeholder="Ange mobilnummer" name="phoneNr" >

          <label for="psw" class="boxLabel"><b>Lösenord</b></label>
          <input type="password" class="boxInput" placeholder="Ange lösenord" name="psw" >

          <label for="description" class="boxLabel"><b>Beskrivning</b></label>
          <input type="text" class="boxInput" placeholder="Ange en beskrivning av StudyCoachen" name="description" >

          <div class="subjects">
          <label for="description" class="labelSubjects"><b>Ämnen</b></label>
          <p class="dropdownInfo">*Håll in ctrl eller ⌘ för att välja flera ämnen</p>
          <?php
          // Lista över valbara ämnen för en studiecoach att hjälpa till med
          // Queryn hämtar ämnen från databasen
          $result_options = $connection->query(showSubjects());
          $select_name = "subject";

            // Om tabellen har fler än 0 rader exekveras koden
            if ($result_options->num_rows > 0)
            {
              // Skapar dropdown-lista med multiple choice
              echo "<select multiple='multiple' name=".$select_name."[] >";
              // Hämtar alla rader från resultatet av query
              while ($row = $result_options->fetch_row())
              {
                // Matar ut options baserat på datan från tabellen
                $val = $row[0];
                echo utf8_encode("<option value=\"$val\">$val</option>\n");
              }
              echo "</select>";
            }
          ?>
          </div>
          <button name="btnReg" class="btnregister" type="submit" value="Button">Registrera</button>
        </form>
        </div>
        <?php
        // Plockar ut alla studiecoacher ur databasen
        $result = mysqli_query($connection, showStudyCoaches());
        ?>
        <h2> Ta bort eller redigera info för studiecoach </h2>
        <!-- En tabell där alla studiecoacher ska placeras in-->
        <table class="studyCoachTable">
          <tr class="listheader">
             <th>Namn</th>
             <th>E-post</th>
             <th>Lösenord</th>
             <th>Beskrivning</th>
             <th>Telefonummer</th>
             <th>Alternativ</th>
           </tr>
            <?php
             // Matar ut resultatet från queryn ovan
             while ($row = $result->fetch_assoc())
             {
            ?>
            <!-- Placerar in värdena från databasen i rätt kolumn-->
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["password"]; ?></td>
              <td><?php echo $row["description"]; ?></td>
              <td><?php echo $row["phoneNr"]; ?></td>
                <!-- Skickar coachId via URL med en GET-variabel-->

              <td><button class="btnDelete" onclick="location.href='adminDeletePage.php?id=<?php echo $row["coachId"]; ?>';">Ta bort</button>
              <button class="btnEdit" onclick="location.href='adminEditPage.php?id=<?php echo $row["coachId"]; ?>';">Redigera</button></td>
            </tr>
            <?php
             }
            ?>
        </table>
    </body>
</html>

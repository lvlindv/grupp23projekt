<?php
// Start the session
session_start();

// Koppling till databas
include "db_connect.php";

// Koppling till fil med queries
include "queries.php";
?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <!-- Koppling till js-fil med validering -->
    <script src="functions.js"></script>
    <meta charset="utf-8">
    <title>Startsida</title>
  </head>
      <body>
        <!-- Visar den inloggade admins epostadress-->
        <h1> <?php echo "Välkommen ".$_SESSION["email"]."!"; ?>  </h1>
        <h2> Registrera en ny studiecoach </h2>
        <!-- Ett formulär för att lähha till nya studiecoacher-->
        <form name="regHelper" action="registerToDBCoach.php" method="post" onsubmit="return validateStudyCoach()" >

          <label for="name"><b>Fullständigt namn</b></label>
          <input type="text" placeholder="Ange fullständigt namn på StudyCoachen" name="name">

          <label for="email"><b>E-post</b></label>
          <input type="text" placeholder="Ange epost" name="email" >

          <label for="psw"><b>Lösenord</b></label>
          <input type="password" placeholder="Ange lösenord" name="psw" >

          <label for="description"><b>Beskrivning</b></label>
          <input type="text" placeholder="Ange en beskrivning av StudyCoachen" name="description" >

          <label for="phoneNr"><b>Mobilnummer</b></label>
          <input type="text" placeholder="Ange mobilnummer" name="phoneNr" >

          <input type="submit" value="Registrera">

       </form>


        <?php
        // Plockar ut alla Study Coches ur databasen
        $result = mysqli_query($connection, showStudyCoaches());
        ?>

        <h2> Ta bort eller redigera info för studiecoach </h2>
        <!-- En tabell där alla Studycoaches ska placeras in-->
         <table boarder="0" cellpadding="10" cellspacing="1" width="700" class="tblListForm">
           <tr class="listheader"><th>Namn</th><th>E-post</th><th>Lösenord</th><th>Beskrivning</th><th>Telefonummer</th><th>Alternativ</th></tr>

            <?php
             // Matar ut resultatet från queryn ovan
             while ($row = $result->fetch_assoc())
             {
            ?>
            <!-- Placerar in värdena från databasen i rätt kolumn-->
            <form action="adminDeletePage.php" method="post">
              <tr>
                <!-- Skickar med valt coachId till adminDeletePage.php-->
                <!-- Väljer hidden som type så att det inte visas på sidan-->
                <td> <input type="hidden" name="coachId" value=<?php echo $row["coachId"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["phoneNr"]; ?></td>
                <input type="hidden" >
                <!-- När inputen är "klickad" skickas coachId som ska med i formet -->
                <td> <input type="submit" value="Ta bort" name="btndel"></td>
                <td><a href="adminEditPage.php">Redigera</a></td>
              </tr>
            </form>

            <?php
            // Fortsätter itterationen tills alla StudyCoaches lagts till i tabellen.
             $i++;
             }
            ?>

          </table>
         <?php
          // Länk för att logga ut användare
           echo '<a href="logoutUser.php">Logga ut</a>';
          ?>
      </body>
</html>

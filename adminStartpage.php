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
    <script src="functions.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="admin.css">
    <title>Startsida</title>
  </head>
      <body>
        <!-- Visar den inloggade admins epostadress-->
        <h1> <?php echo "Välkommen ".$_SESSION["adminEmail"]."!"; ?>  </h1>

        <div class="formRegisterCoach">
<div class="boxTitle">
  <h2> Registrera en ny studiecoach </h2>
</div>
        <!-- Ett formulär för att lähha till nya studiecoacher-->
        <form name="regHelper" action="registerToDBCoach.php" method="post" onsubmit="return validateStudyCoach()" >

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

          <label for="subjects" class="boxLabel"><b>Ämnen</b></label>
          <input type="text" class="boxInput" placeholder="Ange ämnen" name="subject" >

          <button type="submit" class="registrera">Registrera</button>

       </form>

        </div>
        <?php
        // Plockar ut alla Study Coches ur databasen
        $result = mysqli_query($connection, showStudyCoaches());
        ?>

        <h2> Ta bort eller redigera info för studiecoach </h2>
        <!-- En tabell där alla Studycoaches ska placeras in-->
         <table class="studieCoachTable">
           <tr class="listheader">
             <th>Namn</th>
             <th>E-post</th>
             <th>Lösenord</th>
             <th>Beskrivning</th>
             <th>Telefonummer</th>
             <th>Alternativ</th>
             <th></th>
           </tr>

            <?php
             // Matar ut resultatet från queryn ovan
             while ($row = $result->fetch_assoc())
             {
            ?>
            <!-- Placerar in värdena från databasen i rätt kolumn-->
              <tr>
                <!-- Skickar med valt coachId till adminDeletePage.php-->
                <!-- Väljer hidden som type så att det inte visas på sidan-->

                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["phoneNr"]; ?></td>
                <!-- När inputen är "klickad" skickas coachId som ska med i formet -->

                <!-- coahID skickas med url:n när användaren klickar på länken-->
                <td><button onclick="location.href='adminDeletePage.php?id=<?php echo $row["coachId"]; ?>';">Ta bort</button></td>
                <td><button onclick="location.href='adminEditPage.php?id=<?php echo $row["coachId"]; ?>';">Redigera</button></td>

              </tr>



            <?php
             }
            ?>

          </table>

          <!-- Länk för att logga ut användare -->
          <a href="logoutUser.php" class="boxLinkLogout">Logga ut</a>

      </body>
</html>

<?php
// Start the session
session_start();

include "db_connect.php";

// Koppling till fil med funktioner
include "functions.php";

// Kollar om användare är inloggad som admin
loggedInAsAdmin();

// Hämtar ur variabeln ur URL:en
$coachId = $_GET['id'];

// Tar ut alla värden från tabellen, som ska ha samma som get-variabeln, det id nummer som coachen har på den raden kan klickar
$coach = $connection->query("SELECT * FROM StudyCoach WHERE coachId = '$coachId' LIMIT 1")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit page</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>

  <div class="formRegisterCoach">
  <div class="boxTitle">
    <h2> Redigera vald studiecoach </h2>
  </div>

<!--Först visas alla fälten man hämtat från tabellen (med det id man valt) sedan skickas man vidare till update när man klickar på redigera knappen-->
    <form name="regHelper" action="adminUpdate.php" method="post" onsubmit="return validateStudyCoach()" >

      <label class="boxLabel" for="name" ><b>Fullständigt namn</b></label>
      <input class="boxInput" value="<?php echo $coach['name'] ?>" type="text" placeholder="Ange fullständigt namn på StudyCoachen" name="name">

      <label class="boxLabel" for="email"><b>E-post</b></label>
      <input class="boxInput" value="<?php echo $coach['email'] ?>" type="text" placeholder="Ange epost" name="email" >

      <label class="boxLabel" for="psw"><b>Lösenord</b></label>
      <input class="boxInput" value="<?php echo $coach['password'] ?>" type="password" placeholder="Ange lösenord" name="psw" >

      <label class="boxLabel" for="description"><b>Beskrivning</b></label>
      <input class="boxInput" value="<?php echo $coach['description'] ?>" type="text" placeholder="Ange en beskrivning av StudyCoachen" name="description" >

      <label class="boxLabel" for="phoneNr"><b>Mobilnummer</b></label>
      <input class="boxInput" value="<?php echo $coach['phoneNr'] ?>" type="text" placeholder="Ange mobilnummer" name="phoneNr" >

<!-- coachid är en hidden typ, denna visas ej men finns med och skickas då vidare till adminUpdate.php men inte synligt-->
      <input type="hidden" name="coachId" value="<?php echo $coachId; ?>">
      <button type="submit" class="registrera">Spara</button>

   </form>

 </div>

  </body>
</html>

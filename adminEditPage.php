<?php

include "db_connect.php";
$coachId = $_GET['id'];

$coach = $connection->query("SELECT * FROM StudyCoach WHERE coachId = '$coachId' LIMIT 1")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit page</title>
  </head>
  <body>

    <form name="regHelper" action="registerToDBCoach.php" method="post" onsubmit="return validateStudyCoach()" >

      <label for="name"><b>Fullständigt namn</b></label>
      <input value="<?php echo $coach['name'] ?>" type="text" placeholder="Ange fullständigt namn på StudyCoachen" name="name">

      <label for="email"><b>E-post</b></label>
      <input value="<?php echo $coach['email'] ?>" type="text" placeholder="Ange epost" name="email" >

      <label for="psw"><b>Lösenord</b></label>
      <input value="<?php echo $coach['password'] ?>" type="password" placeholder="Ange lösenord" name="psw" >

      <label for="description"><b>Beskrivning</b></label>
      <input value="<?php echo $coach['description'] ?>" type="text" placeholder="Ange en beskrivning av StudyCoachen" name="description" >

      <label for="phoneNr"><b>Mobilnummer</b></label>
      <input value="<?php echo $coach['phoneNr'] ?>" type="text" placeholder="Ange mobilnummer" name="phoneNr" >

      <input type="submit" value="Spara">

   </form>

  </body>
</html>

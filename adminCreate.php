<?php include "db_connect.php"

?>

<!DOCTYPE html>
<html>
  <head>
    <script src="functions.js"></script>
    <meta charset="utf-8">

    <title></title>
    </head>
      <body>
        <form name="regHelper" action="nyRegHelper.php" method="post" onsubmit="return validateregistration()" >

      <label for="name"><b>Fullständigt namn</b></label>
      <input type="text" placeholder="Ange fullständigt namn på StudyHelper" name="name" >

      <label for="email"><b>epost</b></label>
      <input type="text" placeholder="Ange epost" name="email" >

      <label for="psw"><b>Lösenord</b></label>
      <input type="password" placeholder="Ange lösenord" name="psw" >

      <label for="description"><b>Beskrivning</b></label>
      <input type="text" placeholder="Ange en beskrivning av StudyHelper" name="description" >

      <label for="phoneNr"><b>Mobilnummer</b></label>
      <input type="text" placeholder="Ange mobilnummer" name="phoneNr" >

      <input type="submit" value="Registrera">
        <script src="studybuddy.js"></script>

        </form>

    <h1> Adminsida </h1>
    <p> Lägga till/Ta bort eller Redigera info för studyhelper... </p>

      <button type="submit" >Registrera en ny StudyHelper</button>
      <button type="submit" >Ta bort StudyHelper</button>
      <button type="submit" >Redigera info för en StudyHelper</button>
  </body>
</html>

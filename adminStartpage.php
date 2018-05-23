<?php
// Start the session
session_start();

//Koppling till databas
include "db_connect.php"
?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <script src="functions.js"></script>
    <meta charset="utf-8">
    <title>Startsida</title>
    </head>
    <h1> <?php echo "Välkommen ".$_SESSION["name"]."!"; ?>  </h1>
    <h2> Registrera en ny studiecoach </h2>
      <body>
        <form name="regHelper" action="registerToDBCoach.php" method="post" onsubmit="return validateStudycoach()" >

      <label for="name"><b>Fullständigt namn</b></label>
      <input type="text" placeholder="Ange fullständigt namn på StudyCoachen" name="name" >

      <label for="email"><b>E-post</b></label>
      <input type="text" placeholder="Ange epost" name="email" >

      <label for="psw"><b>Lösenord</b></label>
      <input type="password" placeholder="Ange lösenord" name="psw" >

      <label for="description"><b>Beskrivning</b></label>
      <input type="text" placeholder="Ange en beskrivning av StudyCoachen" name="description" >

      <label for="phoneNr"><b>Mobilnummer</b></label>
      <input type="text" placeholder="Ange mobilnummer" name="phoneNr" >

      <input type="submit" value="Registrera">
        <script src="functions.js"></script>

        </form>

    <h2> Ta bort eller Redigera info för studiecoach </h2>

<?php

$sql = "SELECT * FROM StudyCoach ORDER BY coachId DESC";
$result = mysqli_query($connection, $sql);

 ?>


 <table boarder="0" cellpadding="10" cellspacing="1" width="700" class="tblListForm">
   <tr class="listheader"><th>Namn</th><th>E-post</th><th>Lösenord</th><th>Beskrivning</th><th>Telefonummer</th><th>Alternativ</th>
   </tr>

   <?php

     //Matar ut resultatet från queryn ovan
     while ($row = $result->fetch_assoc())
     {
    // $i=0;
       // while($row = mysqli_fetch_array($result)) {
       // if($i%2==0)
       // $classname="evenRow";
       // else
       // $classname="oddRow";
    ?>
     <td><?php echo $row["name"]; ?></td>
     <td><?php echo $row["email"]; ?></td>
     <td><?php echo $row["password"]; ?></td>
     <td><?php echo $row["description"]; ?></td>
     <td><?php echo $row["phoneNr"]; ?></td>

     <td><form action="adminDeletePage.php" method="post">
       <input type="submit" value="Ta Bort" name="btndel">
     </form></td>


     </tr>

 <?php
 $i++;
 }
 ?>


 </table>
 <?php
  //Länk för att logga ut användare
   echo '<a href="logoutUser.php">Logga ut</a>';
  ?>
  </body>
</html>

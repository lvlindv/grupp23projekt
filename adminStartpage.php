<?php
include "db_connect.php"

?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <script src="functions.js"></script>
    <meta charset="utf-8">
    <title>Startsida Admin</title>
    </head>
    <h1> Adminsida </h1>
    <h2> Registrera en ny studycoach </h2>
      <body>
        <form name="regHelper" action="registerToDBCoach.php" method="post" onsubmit="return validateStudycoach()" >

      <label for="name"><b>Fullständigt namn</b></label>
      <input type="text" placeholder="Ange fullständigt namn på StudyCoachen" name="name" >

      <label for="email"><b>epost</b></label>
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

    <h2> Ta bort eller Redigera info för studyhelper </h2>

<?php

$sql = "SELECT * FROM StudyCoach ORDER BY coachId DESC";
$result = mysqli_query($connection, $sql);

 ?>

 <table boarder="0" cellpadding="10" cellspacing="1" width="700" class="tblListForm">
   <tr class="listheader">

     <td>Namn</td>
     <td>Email</td>
     <td>Lösenord</td>
     <td>Beskrivning</td>
     <td>Telefonummer</td>
     <td>Alternativ</td>
   </tr>

   <?php
       $i=0;
       while($row = mysqli_fetch_array($result)) {
       if($i%2==0)
       $classname="evenRow";
       else
       $classname="oddRow";
    ?>

  <tr class="<?php if(isset($classname)) echo $classname;?>">
     <td><?php echo $row["name"]; ?></td>
     <td><?php echo $row["email"]; ?></td>
     <td><?php echo $row["password"]; ?></td>
     <td><?php echo $row["description"]; ?></td>
     <td><?php echo $row["phoneNr"]; ?></td>

     <td><a href="adminEditPage.php?userId=<?php echo $row["userId"]; ?>" class="link"><img alt='edit' title='edit' src='images/edit.png' width='50px' height='15px' hspace='10' /></a>
         <a href="adminDeletePage.php?userId=<?php echo $row["userId"]; ?>"  class="link"><img alt='Radera' title='Radera' src='images/Radera.png' width='50px' height='15px'hspace='10' /></a></td>
   </tr>

 <?php
 $i++;
 }
 ?>


 <?php
//if(isset($_GET['edit']))
//{
  //$userId = $_GET['edit'];
  //$update = true;
  //$record = mysqli_query($db, "SELECT * FROM StudyCoach WHERE coachId=$userId");
//}
  ?>

 </table>



  </body>
</html>

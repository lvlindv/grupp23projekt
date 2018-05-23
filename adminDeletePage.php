<?php
session_start();
include 'db_connect.php';

if (isset($_POST['btndel']))
{
	$id = $row["name"];
	mysqli_query($connection, "DELETE FROM StudyCoach WHERE name=$id");
	echo "Address deleted!";
}





//$sql="DELETE FROM StudyCoach WHERE coachId= "



      // $sql="SELECT comment, username FROM comments NATURAL JOIN users ORDER BY comId DESC"; //få ut inputen i kolumnerna comment och username
      // $sql2="SELECT username FROM users"; //används ej - vill få fram användarnament
      //
      //
      //  $result1 = mysqli_query($connection, $sql);
      //  $result2 = mysqli_query($connection, $sql2); //används ej
      //
      //    if ($result1){
      //      while($row = $result1->fetch_assoc())
      //      {  //hämtar ut en viss rad från result1
      //          echo "<p> kommentar: ".$row["comment"]. "</p>"; //visa kommentar
      //          echo "<p> userId: ".$row["username"]. "</p>"; //visa användarnamnet (som den som loggat in har - när den skrivit kommentar och registrerat sig)
      //        }
      //    }

         // else
         // {
         //   echo "Inga resultat"; //om inga kommentarer finns
         // }
         //
         // $conn->close();
   ?>

   <!DOCTYPE html>
   <html lang="sv" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title></title>
     </head>
     <body>
       
     </body>
   </html>

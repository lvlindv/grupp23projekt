<?php
// Start the session
session_start();

?>

<!DOCTYPE HTML>
<html lang="sv" dir="ltr">
  <head>
    <script src="functions.js"></script>
    <meta charset="utf-8">
    <title>Startsida</title>
  </head>

  <body>
    <?php
      //Om användaren trycker på btnLogin
      if(isset($_POST['btnLogin']))
      {
        //Koppling till databas
        require 'db_connect.php';

        //Variablerna antar värdet av användarens input i loginForm
        $email = $_POST['email'];
        $psw = $_POST['psw'];

        //Query som hämtar rader i tabellen StudyCoach som motsvarar inmatad email och lösenord
        $resultStudyCoach = mysqli_query($connection, 'SELECT * FROM StudyCoach WHERE email="'.$email.'" AND password="'.$psw.'"');
        //Query som hämtar rader i tabellen Student som motsvarar inmatad email och lösenord
        $resultStudent = mysqli_query($connection, 'SELECT * FROM Student WHERE email="'.$email.'" AND password="'.$psw.'"');
        //Query som hämtar rader i tabellen Admin som motsvarar inmatad email och lösenord
        $resultAdmin = mysqli_query($connection, 'SELECT * FROM Admin WHERE email="'.$email.'" AND password="'.$psw.'"');

        //Om det generererade resultatet motsvarar en rad (EN användare) i tabellen StudyCoach
        if(mysqli_num_rows($resultStudyCoach)==1)
        {
          //Sätter sessionsvariabeln till användarens email och matar ut meddelande
          $_SESSION["email"] = $_POST['email'];
          header("Location: coachStartpage.php");
        }
        //Om det generererade resultatet motsvarar en rad (EN användare) i tabellen Student
        else if(mysqli_num_rows($resultStudent)==1)
        {
          //Sätter sessionsvariabeln till användarens email och matar ut meddelande
          $_SESSION["email"] = $_POST['email'];
          header("Location: studentStartpage.php");
        }
        else
        {
          //Ogiltig inmatning och användaren får klicka sig tillbaka till startsidan.
          echo "Ogiltig inloggning.";
          echo '<a href="startpage.php">Tillbaka till startsidan.</a>';
        }
      }

    ?>

  </body>

</html>

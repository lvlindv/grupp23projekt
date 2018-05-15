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
      if(isset($_POST['btnLogin']))
      {
        //Koppling till databas
        require 'db_connect.php';

        //Variablerna antar värdet av användarens input i loginForm
        $email = $_POST['email'];
        $psw = $_POST['psw'];

        //Query som hämtar rader i tabellen StudyCoach som motsvarar inmatad email och lösenord
        $result = mysqli_query($connection, 'SELECT * FROM StudyCoach WHERE email="'.$email.'" AND password="'.$psw.'"');

        //Om det generererade resultatet motsvarar en rad (EN användare) i tabellen
        if(mysqli_num_rows($result)==1)
        {
          //Sätter sessionsvariabeln till användarens email och matar ut meddelande
          $_SESSION["email"] = $_POST['email'];
          echo $_SESSION["email"]." är inloggad.";
          echo '<a href="logoutUser.php">Logga ut</a>';
        }
        else
        {
          echo "Ogiltig inloggning.";
          echo '<a href="startpage.php">Tillbaka till startsidan.</a>';
        }
      }

    ?>




  </body>

</html>

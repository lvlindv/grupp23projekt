<?php
  // Start the session
  session_start();

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
      //Hämtar rader ur tabell
      $row = $resultStudyCoach->fetch_assoc();
      //Sätter sessionsvariabler
      $_SESSION["email"] = $_POST['email'];
      $_SESSION["name"] = $row["name"];
      //Skickar vidare till startsida
      header("Location: coachStartpage.php");
    }
    //Om det generererade resultatet motsvarar en rad (EN användare) i tabellen Student
    else if(mysqli_num_rows($resultStudent)==1)
    {
      //Hämtar rader ur tabell
      $row = $resultStudent->fetch_assoc();
      //Sätter sessionsvariabler
      $_SESSION["email"] = $_POST['email'];
      $_SESSION["name"] = $row["name"];
      //Skickar vidare till startsida
      header("Location: studentStartpage.php");
    }
    else if(mysqli_num_rows($resultAdmin)==1)
    {
      //Hämtar rader ur tabell
      $row = $resultAdmin->fetch_assoc();
      //Sätter sessionsvariabler
      $_SESSION["email"] = $_POST['email'];
      $_SESSION["name"] = $row["name"];
      //Skickar vidare till startsida
      header("Location: adminStartpage.php");
    }

    else
    {
      //Ogiltig inmatning och användaren får klicka sig tillbaka till startsidan.
      echo "Ogiltig inloggning.";
      echo '<a href="startpage.php">Tillbaka till startsidan.</a>';
    }
  }
?>

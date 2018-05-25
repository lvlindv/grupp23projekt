<?php
  // Startar sessionen
  session_start();

  // Koppling till fil med queries
  include "queries.php";

  // Om användaren trycker på btnLogin
  if(isset($_POST['btnLogin']))
  {
    // Koppling till databas
    require 'db_connect.php';

    // Variablerna antar värdet av användarens input i loginForm
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    // Hämtar rader i tabellen StudyCoach som motsvarar inmatad email och lösenord
    $resultStudyCoach = mysqli_query($connection, getStudyCoach($email, $psw));
    // Hämtar rader i tabellen Student som motsvarar inmatad email och lösenord
    $resultStudent = mysqli_query($connection, getStudent($email, $psw));
    // Hämtar rader i tabellen Admin som motsvarar inmatad email och lösenord
    $resultAdmin = mysqli_query($connection, getAdmin($email, $psw));

    // Om det generererade resultatet motsvarar en rad (EN användare) i tabellen StudyCoach
    if(mysqli_num_rows($resultStudyCoach)==1)
    {
      // Hämtar rader ur tabell
      $row = $resultStudyCoach->fetch_assoc();
      // Sätter sessionsvariabler
      $_SESSION["coachEmail"] = $_POST['email'];
      $_SESSION["name"] = $row["name"];
      $_SESSION["coachId"] = $row["coachId"];
      // Skickar vidare till startsida
      header("Location: coachStartpage.php");
    }
    // Om det generererade resultatet motsvarar en rad (EN användare) i tabellen Student
    else if(mysqli_num_rows($resultStudent)==1)
    {
      // Hämtar rader ur tabell
      $row = $resultStudent->fetch_assoc();
      // Sätter sessionsvariabler
      $_SESSION["studentEmail"] = $_POST['email'];
      $_SESSION["name"] = $row["name"];
      $_SESSION["studentId"] = $row["studentId"];
      // Skickar vidare till startsida
      header("Location: studentStartpage.php");
    }
    else if(mysqli_num_rows($resultAdmin)==1)
    {
      // Hämtar rader ur tabell
      $row = $resultAdmin->fetch_assoc();
      // Sätter sessionsvariabler
      $_SESSION["adminEmail"] = $_POST['email'];
      $_SESSION["name"] = $row["name"];
      // Skickar vidare till startsida
      header("Location: adminStartpage.php");
    }

    else
    {
      // Ogiltig inmatning och användaren får klicka sig tillbaka till startsidan.
      echo "Ogiltig inloggning.";
      echo '<a href="startpage.php">Tillbaka till startsidan.</a>';
    }
  }
?>

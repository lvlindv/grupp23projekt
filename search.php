<?php
  //Start the session
  session_start();

  //Koppling till databas
  include "db_connect.php";

  //Koppling till fil med queries
  include "queries.php";

  //Om användaren trycker på sök-knappen
  if(isset($_POST['btnSearch']))
  {
    // Lagrar vald dag i sessionvariabeln
    $_SESSION["selectedDay"] = $_POST['dayName'];
    // Lagrar valt ämne i sessionvariabeln
    $_SESSION["selectedSubject"] = $_POST['name'];
  }

  //Lagrar värdena av sessionvariablerna i nya varibler som ska sättas in i query
  $selectedDay = $_SESSION["selectedDay"];
  $selectedSubject = $_SESSION["selectedSubject"];

  //SQL-query som hämtar tillgängliga studiecoacher
  $queryAvailableCoaches = "SELECT StudyCoach.name, StudyCoach.description
                              FROM StudyCoach
                              INNER JOIN CoachSubjects ON CoachSubjects.coachId=StudyCoach.coachId
                              INNER JOIN Availability ON Availability.coachId=StudyCoach.coachId
                              WHERE Availability.day='$selectedDay' AND CoachSubjects.subjectName='$selectedSubject'";

  //Lagrar queryresultat i en sessionsvariabel
  $_SESSION["resultAvailability"] = $connection->query($queryAvailableCoaches);

  print_r($_SESSION);

  //Kopplar tillbaka till studentStartpage.php
  //header("Location: studentStartpage.php");

?>

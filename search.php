<?php
  //Start the session
  session_start();

  //Koppling till databas
  include "db_connect.php";

  //Koppling till fil med queries
  include "queries.php";

  if(isset($_POST['btnSearch']))
  {
    // Lagrar vald dag i sessionvariabeln
    $_SESSION['selectedDay'] = $_POST['dayName'];
    // Lagrar valt ämne i sessionvariabeln
    $_SESSION['selectedSubject'] = $_POST['name'];
  }

  //Lagrar värdena av sessionvariablerna i nya varibler som ska sättas in i query
  $selectedDay = $_SESSION['selectedDay'];
  $selectedSubject = $_SESSION['selectedSubject'];

  //Visar tillgängliga studiecoacher
  $queryAvailableCoaches = "SELECT StudyCoach.name, CoachSubjects.subjectName,
                              StudyCoach.description
                              FROM StudyCoach
                              INNER JOIN CoachSubjects ON CoachSubjects.coachId=StudyCoach.coachId
                              INNER JOIN Availability ON Availability.coachId=StudyCoach.coachId
                              WHERE Availability.day='$selectedDay' AND CoachSubjects.subjectName='$selectedSubject'";

  $resultAvailability = $connection->query($queryAvailableCoaches);

  if(mysqli_num_rows($resultAvailability)<1)
  {
    echo "Det finns inga tillgängliga studiecoacher för den valda dagen/ämnet.";
    echo '<a href="studentStartpage.php">Vänligen gör om din sökning.</a>';
  }
  else
  {
    while ($row = $resultAvailability->fetch_assoc())
    {
      echo $row ["name"];
      echo $row ["subjectName"];
      echo $row ["description"];
      echo "<br/>";
    }
  }

?>

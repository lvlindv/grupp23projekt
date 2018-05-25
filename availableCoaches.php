<?php
  // Koppling till fil med funktioner
  include "functions.php";

  // Kollar om student är inloggad
  loggedInAsStudent();

  //Om användaren trycker på sök-knappen
  if(isset($_POST['btnSearch']))
  {
    // Lagrar vald dag i variabel
    $_SESSION['selectedDay'] = $_POST['dayName'];
    // Lagrar valt ämne i variabel
    $_SESSION['selectedSubject'] = $_POST['name'];
  }

  //Lagrar sessionvariabler i nya variabler för att lägga in i query
  $selectedDay = $_SESSION['selectedDay'];
  $selectedSubject = $_SESSION['selectedSubject'];

  //Hämtar tillgängliga studiecoacher genom funktion i queries.php och lagrar resultat i variabel
  $resultAvailability = $connection->query(availableCoaches($selectedDay, $selectedSubject));

  ?>

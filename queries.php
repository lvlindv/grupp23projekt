<?php
  session_start();

  //Visar alla bokningar som lagts in i databasen
  $queryShowBookings = "SELECT Booking.day,
                  Booking.subject,
                  StudyCoach.name AS coachName,
                  StudyCoach.phoneNr AS coachNr,
                  StudyCoach.email AS coachEmail,
                  Student.name AS studentName,
                  Student.phoneNr AS studentNr,
                  Student.email AS studentEmail
            FROM Booking
            INNER JOIN Student ON Student.studentId=Booking.studentId
            INNER JOIN StudyCoach ON StudyCoach.coachId=Booking.coachId";

  //Query för att få ut enskilda studenters bokningar
  $queryStudentBookings = "SELECT Booking.day,
                  Booking.subject,
                  StudyCoach.name AS coachName,
                  StudyCoach.phoneNr AS coachNr,
                  StudyCoach.email AS coachEmail,
                  Student.name AS studentName,
                  Student.phoneNr AS studentNr,
                  Student.email AS studentEmail
            FROM Booking
            INNER JOIN Student ON Student.studentId=Booking.studentId
            INNER JOIN StudyCoach ON StudyCoach.coachId=Booking.coachId
            WHERE Student.email='{$_SESSION["email"]}'";

  //Query för att få ut enskilda studiecoachers bokningar
  $queryCoachBookings = "SELECT Booking.day,
                  Booking.subject,
                  StudyCoach.name AS coachName,
                  StudyCoach.phoneNr AS coachNr,
                  StudyCoach.email AS coachEmail,
                  Student.name AS studentName,
                  Student.phoneNr AS studentNr,
                  Student.email AS studentEmail
            FROM Booking
            INNER JOIN Student ON Student.studentId=Booking.studentId
            INNER JOIN StudyCoach ON StudyCoach.coachId=Booking.coachId
            WHERE StudyCoach.email='{$_SESSION["email"]}'";

  //Visar alla veckodagar i ordning
  $queryShowDays = "SELECT name FROM Days ORDER BY dayOrder ASC";

  //Visar alla ämnen
  $queryShowSubjects ="SELECT name FROM Subjects";

?>

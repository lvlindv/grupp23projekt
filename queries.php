<?php

  // Hämtar ut enskilda studenters bokningar
  function showStudentBookings($email)
  {
    $query = "SELECT Booking.day,
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
                  WHERE Student.email='$email'";

    return $query;
  }

  // Hämtar ut enskilda studiecoachers bokningar
  function showCoachBookings($email)
  {
    $query = "SELECT Booking.day,
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
                            WHERE StudyCoach.email='$email'";
    return $query;
  }


  // Hämtar alla ämnen
  function showSubjects()
  {
    $query ="SELECT name FROM Subjects";

    return $query;
  }

  // Lägger till tillgänglighet för studiecoacher
  function addAvailability($selectedDay, $coachId)
  {
    $query = "INSERT INTO Availability(day, coachId) VALUES ('$selectedDay', '$coachId')";

    return $query;
  }

  // Tar bort tillgänglighet för studiecoacher
  function deleteAvailability($selectedDay, $coachId)
  {
    $query = "DELETE FROM `Availability` WHERE day='$selectedDay' AND coachId='$coachId'";

    return $query;
  }

  // Hämtar tillgängliga studiecoacher
  function availableCoaches($selectedDay, $selectedSubject)
  {
    $query = "SELECT StudyCoach.name, StudyCoach.description, StudyCoach.coachId
              FROM StudyCoach
              INNER JOIN CoachSubjects ON CoachSubjects.coachId=StudyCoach.coachId
              INNER JOIN Availability ON Availability.coachId=StudyCoach.coachId
              WHERE Availability.day='$selectedDay' AND CoachSubjects.subjectName='$selectedSubject'";

    return $query;
}

  // Lägger till ny bokning
  function addBooking($day, $subject, $studentId, $coachId)
  {
    $query = "INSERT INTO `Booking`(`day`, `subject`, `studentId`, `coachId`, `bookingId`)
              VALUES ('$day', '$subject', '$studentId', '$coachId', 0)";

    return $query;
  }

  // Tar bort vald studiecoach
  function deleteStudyCoach($coachId)
  {
    $query = "DELETE FROM `StudyCoach` WHERE coachId='$coachId'";

    return $query;
  }

  // Hämtar ut alla studiecoacher ur databasen
  function showStudyCoaches()
  {
    $query = "SELECT * FROM StudyCoach ORDER BY coachId DESC";

    return $query;
  }


?>

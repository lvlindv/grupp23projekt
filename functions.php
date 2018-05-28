<?php

// Skapar en dropdown meny av data från databasen
function make_select_from_result($select_name, $result_options)
{
	// Om tabellen har fler än 0 rader exekveras koden
	if ($result_options->num_rows > 0)
	{

		echo utf8_encode("<select name=\"$select_name\">\n");
		// Hämtar alla rader från resultatet av query
		while ($row = $result_options->fetch_row())
		{
			// Matar ut options baserat på datan från tabellen
			$val = $row[0];
			echo utf8_encode("<option value=\"$val\">$val</option>\n");
		}
		echo "</select>\n";
	}
}

// Kollar om användare är inloggad som student
function loggedInAsStudent()
{
  // Om användaren inte är inloggad skickas man till startsidan
  if(!isset($_SESSION["studentEmail"]))
  {
    header("Location: startpage.php");
  }
}

// Kollar om användare är inloggad som studiecoach
function loggedInAsStudyCoach()
{
  // Om användaren inte är inloggad skickas man till startsidan
  if(!isset($_SESSION["coachEmail"]))
  {
    header("Location: startpage.php");
  }
}

// Kollar om användare är inloggad som admin
function loggedInAsAdmin()
{
  // Om användaren inte är inloggad skickas man till startsidan
  if(!isset($_SESSION["adminEmail"]))
  {
    header("Location: startpage.php");
  }
}

?>

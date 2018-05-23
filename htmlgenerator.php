<?php

//Tar emot ett kolumnnamn och en tabell
function make_select_from_result($select_name, $result_options)
{
	//Om tabellen har fler än 0 rader exekveras koden
	if ($result_options->num_rows > 0)
	{
		echo utf8_encode("<select name=\"$select_name\">\n");
		while ($row = $result_options->fetch_row())
		{
			$val = $row[0];
			echo utf8_encode("<option value=\"$val\">$val</option>\n");
		}
		echo "</select>\n";
	}
}

?>

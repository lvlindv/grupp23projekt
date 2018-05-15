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

function make_table_from_result($result)
{
	if ($result->num_rows > 0)
	{
		echo "<table border=1>\n<tr>";
		foreach($result->fetch_fields() as $field_name)
		{
			echo utf8_encode("<td>" . $field_name->name . "</td>\n");
		}
		echo "</tr>";
		while ($row = $result->fetch_assoc())
		{
			echo "<tr>\n";
			foreach($row as $column_value)
			{
				echo utf8_encode("<td>".$column_value."</td>\n");
			}
			echo "</tr>\n";
		}
	}
}

?>

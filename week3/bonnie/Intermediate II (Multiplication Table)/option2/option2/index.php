<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Intermediate II</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<table>
		<thead>
			<?php
			for($columns = 0; $columns < 10; $columns++)
			{
				if($columns > 0)
				{
					echo "<th class='emphasized'>" . $columns . "</th>";
				}
				else
				{
					echo "<th> </th>";
				}
			} ?>
		</thead>
		<tbody>
			<?php
			for($rows = 1; $rows < 10; $rows++)
			{
				if(is_int($rows / 2))
				{
					echo "<tr> <td class='emphiasized'>" . $rows . "</td>";
				}
				else
				{
					echo "<tr class='highlighted'> <td class='emphasized'>" . $rows . "</td>";
				}
				for($columns = 1; $columns < 10; $columns++)
				{
					echo "<td>" . $columns * $rows . "</td>";
				}			
				echo "</tr>";
			} 
			?>
		</tbody>
	</table>
<body>
</body>
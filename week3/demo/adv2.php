<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Advanced II : Checkerboard</title>
	<style type="text/css">
	table {
		margin: 15px auto;
		border-collapse: collapse;
	}
	table td {
		width: 25px;
		height: 25px;
		border: 1px solid silver;
	}
	.grid tbody tr td { background-color: #edeceb; }
 
	.grid tbody tr:nth-child(odd) td:nth-child(even),
	.grid tbody tr:nth-child(even) td:nth-child(odd) { background-color: #0d82df; }
 
	</style>
</head>
<body>
	<table class="grid">
		<tr>
		<?php
		for ($i=0; $i < 9; $i++)
		{ 
			echo "<tr>";
			for ($y=0; $y < 9; $y++) 
			{ 
				echo "<td></td>";
			}
			echo "</tr>";
		}
		?>
	</tr>
	</table>
</body>
</html>


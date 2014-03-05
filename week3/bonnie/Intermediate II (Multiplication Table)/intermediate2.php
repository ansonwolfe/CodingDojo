<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<link type="text/css" rel="stylesheet">
		<style>
			table, td {
				border: 1px solid black;
				padding: 10px;
			}
			table {
				border-collapse: collapse;
				margin: 50px;
			}
			h1 {
				margin: 50px;
			}
			table th {
				border: 1px solid black;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<h1>Multiplication Table</h1>
		<table>
			<thead>
				<tr>
<?php
				// the top row of numbers
				for ($counter=0; $counter<10; $counter++)
				{
					if ($counter != 0)
					{
						echo "<th>".$counter."</th>";
					}
					else
					{
						echo "<th></th>";
					}
				}
?>
				</tr>
			</thead>
			<tbody>
<?php
			// the multiplication table
			for ($counter=1; $counter<10; $counter++)
			{
				if ($counter % 2)
				{
					echo "<tr style='background-color: silver;'>";
				}
				else
				{
					echo "<tr>";
				}
				echo "<td>".$counter."</td>";

				for ($inner_counter=1; $inner_counter<10; $inner_counter++)
				{
					echo "<td>" . ($counter*$inner_counter) . "</td>";
				}
				echo "</tr>";
			}
?>
			</tbody>
		</table>
	</body>
</html>
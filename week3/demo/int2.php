<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multiplication table</title>
	<style type="text/css">
		body {
			font-family: helvetica, arial;
		}
		table {
			border-collapse: collapse;
		}
		table td, th {
			border: 1px solid silver;
			padding: 7px;
		}
		table tr:nth-child(even) {
			background-color: #F0F0F0;
		}
		table td:nth-child(1) {
			font-weight: bold;
		}
		#wrapper {
			margin: 30px auto;
		}

	</style>
	</head>
	<body>
		<div id ="wrapper">
			<h2>Multiplication Table by PHP</h2>
			<table>
				<tr>	
					<?php
							echo "<td>";
							for ($i=1; $i <10 ; $i++) 
							{
								echo "<th>" . "$i" . "</th>"; 
							}
							echo "</td>";
					?>
				</tr>				
				<tr>
					<?php
						for ($i=1; $i <10 ; $i++) 
						{ 
							echo "<tr>" . "<td>" . $i;

							for ($y=1; $y <10 ; $y++) 
							{ 
								$times = $i * $y;
								echo "<td>" . $times . "</td>";
							}
							echo "</td> </tr>";
						}
					?>
				</tr>

			</table>
		</div>	
	</body>
</html>


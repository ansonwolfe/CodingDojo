<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<link href="style.css" rel="stylesheet">
		
	</head>
	<body>
		<h1>Checker Boards</h1>
		<h2>Black n Red</h2>
		<table>
		<?php
		/* Here we set $alternate_colors to 1 and $dimension to 8. $alternate_colors will be
		* used inside our for loop so that we can test whether a <td> should be colored
		* with red or black. $dimension just sets the dimension of the checker board,
		* dimension = 8 is a 8 by 8 dimension checkerboard.
		*/
		$alternate_colors = 1;
		$dimension = 8;


		/* This for loop will create rows for us. Since we set $dimension to 8, we will have 8 rows
		* in our checkerboard.
		*/
		for ($counter=0; $counter<$dimension; $counter++)
		{
			/* in our first loop we echo a <tr> tag without closing it. */
			echo "<tr>\n";
			/* after opening our <tr> tag we then create a new for loop for us to insert
			* our <td> items. notice that we reuse the $dimensions variable again, this means
			* that <td>'s will be echoed out 8 times thus making the 8x8 dimension checkerboard.
			*/
			for ($inner_counter=0; $inner_counter<$dimension; $inner_counter++)
			{
				/* $alternate_colors is incremented within this inner for loop. so that each
				* <td> will have alternating colors. We use if statements inside this inner
				* for loop so that if $alternate_colors is divisible by 2, give that particular
				* <td class="red">, if not then give it <td class="black">. (research about
				* what the % operand does.)
				*/
				$alternate_colors++;
				if ($alternate_colors % 2 == 0) 
				{
					echo "<td class='red'></td>\n";
				}
				else
				{
					echo "<td class='black'></td>\n";
				}
			}

			/* Now we close our </tr> tag so that the next loop will be displayed on the next row. */
			echo "</tr>\n";

			/* We increment the $alternate_colors again so that it will have different set of
			* alternating colors on the next rows
			*/
			$alternate_colors++;
		}
?>
		</table>
	
		<h2>Green n Cream</h2>
		<table>
<?php
		for ($counter=0; $counter<$dimension; $counter++)
		{
			echo "<tr>\n";

			for ($inner_counter=0; $inner_counter<$dimension; $inner_counter++)
			{
				$alternate_colors++;
				if ($alternate_colors % 2 == 0) 
				{
					echo "<td class='cream'></td>\n";
				}
				else
				{
					echo "<td class='green'></td>\n";
				}
			}
			echo "</tr>\n";
			$alternate_colors++;
		}
?>
		</table>
		</div>
	</body>
</html>
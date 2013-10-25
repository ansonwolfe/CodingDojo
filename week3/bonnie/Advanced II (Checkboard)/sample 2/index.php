<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>Exercise 8</title>
		<meta name="description" content="php stuffs">
		<meta name="author" content="Eylem Ozaslan">
		<link rel="stylesheet" style="text/css" href="style.css">
	</head>

	<body>
		<?php

			/* Here we created a function called draw_checkerboard() and passed in 3 parameters:
			* $size, $color1, $color2 to process our checkerboard.
			*/
			function draw_checkerboard($size, $color1, $color2){
				echo "<div>";
				/* This for loop will create rows for us. Since we set $size to 8, we will have 8 rows
				* in our checkerboard.
				*/				
				for($counter=0;$counter<$size;$counter++){
					/* in our first loop we echo a <ul> tag without closing it. */
					echo "<ul>";

					/* Here we check if $counter variable is divisible by two, if it is, we give
					* another for loop that will echo <li> elements and will give a pattern of
					* $color1 - $color2 alternating classes.
					*/
					if($counter%2 == 0){
						/* This is the inner for loop which is responsible for echoing out the 
						* li elements. Remember the open <ul> tag at the top? that is because
						* we will insert <li> </li> elements inside it.
						*/
						for($inner_counter=0;$inner_counter<$size;$inner_counter++){
							if($inner_counter%2 == 0){
								echo "<li class='".$color1."'></li>";
							}
							else{
								echo "<li class='".$color2."'></li>";
							};
						}
						/* We then close the <ul> tag after inserting <li> tags into it. */
						echo "</ul>";
					}
					/* If it is not divisible by two, we give it
					* a for loop that will echo <li> elements and will give a pattern of
					* $color2 - $color1 alternating classes.
					*/
					else{
						for($inner_counter=0;$inner_counter<$size;$inner_counter++){
							if($inner_counter%2 == 0){
								echo "<li class='".$color2."'></li>";
							}
							else{
								echo "<li class='".$color1."'></li>";
							};
						}
						/* We then close the <ul> tag after inserting <li> tags into it. */
						echo "</ul>";
					}
				}
				echo "</div>";
			}
			/* this is where we execute our function. Notice that we executed the function twice but
			* with different second and third parameters. this is because we want to have two
			* checkerboards with different alternating colors.
			*/
			draw_checkerboard(8, "red", "black");
			draw_checkerboard(8, "green", "cream");
		?>
	</body>
</html>
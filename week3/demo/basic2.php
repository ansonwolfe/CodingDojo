<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP assignments: Basic 2</title>
</head>
<body>
	<select name="for_dropdown">
		<?php
				$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
				
				for($i=0; $i<count($states); $i++)
				{
					echo '<option value="'.$states[$i] . '">'.$states[$i] . '</option>';
				}			
		?>
	</select>

	<br />
	
	<select name="foreach_dropdown">
			 	<?php
				$states = array('CA', 'WA', 'VA', 'UT', 'AZ');

				foreach($states as $state)
				{
					echo '<option value="'.$state . '">'.$state . '</option>';
				}
			?>
	</select>
	<br />
		<select name="new_dropdown">
			 	<?php
				$states = array('CA', 'WA', 'VA', 'UT', 'AZ','NJ','NY','DE');

				foreach($states as $state)
				{
					echo '<option value="'.$state . '">'.$state . '</option>';
				}
			?>
	</select>

	
</body>
</html>



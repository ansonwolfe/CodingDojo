<?php
	require('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Country Info</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#dropdown_list').submit(function()
			{
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(output)
				{
					$('#about_country').html(output);
					$('table tr:odd').addClass('silver');
				}, "json");
				return false;
			});
		});
	</script>
</head>
<body>
	<div id="wrapper">
<?php
		$world_countries=array();
		$query = "SELECT Name FROM country ORDER BY Name ASC";
		$countries = fetch_all($query);
		foreach($countries as $country)
		{
			$world_countries[]=$country['Name'];
		}
?>
		<form id="dropdown_list" action="process.php" method="post">
			Select a Country: <select name="country_selection">

<?php
			foreach($world_countries as $world_country)
			{
?>	
				<option value="<?= $world_country ?>"><?= $world_country ?></option>
<?php
			}
?>
			</select>
			<input id="button" type="submit" name="submit" value="Show Data" />
		</form>
		<div id="about_country">
		</div>
	</div><!--end wrapper-->
</body>
</html>
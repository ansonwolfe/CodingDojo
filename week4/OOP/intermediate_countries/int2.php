<?php
	include ("process.php");

	$country = new Country();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>World</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#country_form").submit(function(){
				// var form = $(this);
				$.post($(this).attr('action'),
					$(this).serialize(),
					function(selected_country){
						//alert("hi");
						var my_list= "<ul><li>Name: "+selected_country.Name+"</li><li>Continent: "+selected_country.Continent+"</li><li>Region: "+selected_country.Region+"</li><li>Population: "+selected_country.Population+"</li><li>Surface Area: "+selected_country.SurfaceArea+"</li><li>Life Expectancy:  "+selected_country.LifeExpectancy+"</li><li>Government Form: "+selected_country.GovernmentForm+"</li></ul>";
						console.log(my_list);
						$('#country_info').html(my_list);
				},"json");
				return false;
			});
		});

		// $('#country_form').submit();
	</script>

</head>
<body>
	<form id="country_form" action="process.php" method="post">
		<label>Select Country: </label>
		<select name="country_selected">
				<?php foreach($country->pull_country_names() as $country)
				{
					echo "<option value='{$country['code']}'>{$country['name']}</option>";
				}
				?>
		</select>
		<input type="submit" value="Check Info">
	</form>
	<h2>Country Information</h2>
	<hr>
	<div id="country_info">

	</div>	
</body>
</html>

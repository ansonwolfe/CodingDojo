<?php
	session_start();
	
	include "connection.php";

	$query = "SELECT code, name FROM Country;";
	$country_names = fetch_all($query);
	// put the session info into easier to use variables (less typing!)
	$city_details = ($_SESSION['city_details']);
	$country_details = $_SESSION['$country_details'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Green Belt exam - Bonnie</title>
	<style type="text/css">
		table {
			border:1px solid silver;
			border-collapse: collapse;
		}
		table td, th{
			border: 1px solid silver;
			padding: 3px 15px;
			margin: 15px;
		}
	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#country_select').submit(function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
						$('#country_info').html(data.html);
					},
					"json"
			);
			return false;
			$('#country_select').submit();
			});
		});
	</script>

</head>
<body>
	<form id="country_select" action="process.php" method="post">
		<label>Select a Country</label>
		<select name="country">
			<?php  foreach($country_names as $country)
				{
					echo "<option value='{$country['code']}'>{$country['name']}</option>";
				}?>
		</select>
		<input type="submit" value="Show Data">
	</form>

	<div id="country_info">
		<!-- display country name -->
		<h3><?= $country_details[0]['Name']?></h3>
		<h4>Cities</h4>	
		<table>
			<thead>
				<tr>
					<th>City ID</th>
					<th>City Name</th>
					<th>District</th>
					<th>Polulation</th>
				</tr>
			</thead>
			<tbody>
			
		<?php 

			foreach ($city_details as $city) {
				echo "<tr>
						<td>" . $city['ID'] . "</td>
						<td>" . $city['Name'] . "</td>
						<td>" . $city['District'] . "</td>
						<td>" . $city['Population'] . "</td>
					</tr>	
					";
			}
		?>
			</tbody>
		</table>

	<h4>Languages Spoken</h4>	
		<table>
			<thead>
				<tr>
					<th>Language</th>
					<th>Percentage</th>
					<th>Population of People Speaking the Language</th>
					<th>Country's Official Language</th>
				</tr>	
			</thead>
			<tbody>
				<tr>
					<?php foreach ($country_details as $country_language) {
							echo "<tr>
									<td>" . $country_language['Language'] . "</td>
									<td>" . $country_language['Percentage'] . "</td>
									<td>" . $country_language['Percentage']*$country_language['Population'] ."</td>
									<td>";

							if ($country_language['IsOfficial']=='T'){
								echo "<input type='checkbox' checked disabled>";
							}
							else {
								echo "<input type='checkbox' disabled>";	
							}		 

							echo "</td>
								</tr>	
								";
					}?>
				</tr>
			</tbody>
		</table>

	</div>
	

</body>
</html>
<?php 
	unset($_SESSION);
?>
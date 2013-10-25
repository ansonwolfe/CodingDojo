<?php
	require('connection.php');
	function print_country_info(){
 		$query = "SELECT City.*, Country.Name as country_name, Country.Population as country_pop, CountryLanguage.* FROM Country
				LEFT JOIN City on Country.Code = City.CountryCode
				LEFT JOIN CountryLanguage on Country.Code = CountryLanguage.CountryCode 
				WHERE Country.Name = '{$_POST['country_selection']}'
				GROUP BY City.ID";
 		$records = fetch_all($query);	

 		$html = "<h3>Cities in {$_POST['country_selection']}</h3>
					<table border='1'>
						<thead>
							<tr>
								<th>City ID</th>
								<th>City Name</th>
								<th>District</th>
								<th>Population</th>
							</tr>
						</thead>
						<tbody>";

 		foreach($records as $record)
 		{
 			$html .= 		"<tr>
 								<td>".$record['ID']."</td>
 								<td>".$record['Name']."</td>
 								<td>".$record['District']."</td>
 								<td>".$record['Population']."</td>
 							</tr>";
 		}

 		$html .=		"</tbody>
 					</table>
 					<h3>Languages Spoken</h3>
 					<table border='1'>
						<thead>
							<tr>
								<th>Language</th>
								<th>Percentage</th>
								<th>Population of People Speaking the Language</th>
								<th>Country's Official Language</th>
							</tr>
						</thead>
						<tbody>";

		$query = "SELECT City.*, Country.Name as country_name, Country.Population as country_pop, CountryLanguage.* FROM Country
			LEFT JOIN City on Country.Code = City.CountryCode
			LEFT JOIN CountryLanguage on Country.Code = CountryLanguage.CountryCode 
			WHERE Country.Name = '{$_POST['country_selection']}'
			GROUP BY CountryLanguage.Language
			ORDER BY CountryLanguage.Percentage DESC";

 		$records = fetch_all($query);

		foreach($records as $record)
		{
			if($record['IsOfficial']=='T')
			{
				$img = "<img src='images/checked.png' height='20px' />";
			}
			else
			{
				$img = "<img src='images/unchecked.png' height='20px' />";
			}

			$html .=		"<tr>
 								<td>".$record['Language']."</td>
 								<td>".$record['Percentage']."%</td>
 								<td>".$record['Percentage']*$record['country_pop']*0.01."</td>
 								<td>".$img."</td>
 							</tr>";
		}
			$html .=	"</tbody>
					</table>";
 					
 		return $html;
	}
		
	$output = print_country_info();

	echo json_encode($output);
?>
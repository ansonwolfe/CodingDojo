 <?php
 	require ('connection.php');
 	define('DISPLAY_LIMIT', 10);

 	$query = "SELECT * FROM leads WHERE first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%'";

 	$data = array();
 	$users = fetch_all($query);

 	$html = "<table>
 				<thead>
 					<tr>
 						<th>Leads ID</th>
 						<th>First Name</th>
						<th>Last Name</th>
						<th>Registered Date</th>
					</tr>
				</thead>
				<tbody>	
 						";
 	foreach ($users as $user) 
 	{
 		$html .= "
 			<tr>
 				<td>{$user['leads_id']}</td>
 				<td>{$user['first_name']}</td>
 				<td>{$user['last_name']}</td>
 				<td>{$user['registered_datetime']}</td>
 				<td>{$user['email']}</td>
 			</tr>	
 		";
 	}


 	$html .= "
 			</tbody>
 		</table>	
 	";

 	$data['html'] = $html;
 	echo json_encode($data);
?>



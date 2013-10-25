<?php

	define('DISPLAY_LIMIT', 20);

	require("connection.php");

	$data = array();

	$_POST['from_date'] = date('Y-m-d', strtotime($_POST['from_date']));
	
	if($_POST['to_date'] != '')
	{
		$_POST['to_date'] = date('Y-m-d', strtotime($_POST['to_date']));
	}
	else
	{
		$_POST['to_date'] = '2500-01-01';
	}

	$query = "SELECT * FROM leads 
	WHERE (first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%') AND
		registered_datetime BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."'
		ORDER BY last_name ASC 
		LIMIT ".(($_POST['page']-1)*DISPLAY_LIMIT).",".DISPLAY_LIMIT;

	$users = fetch_all($query);

	$query = "SELECT count(*) as total FROM leads 
	WHERE (first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%') AND
		registered_datetime BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."'
	";
	$result = fetch_all($query);
	$total = $result[0]['total'];


	$html = "
		<ul class='page_link'>";
	
	for($i=1; $i<=($total/DISPLAY_LIMIT); $i++)
	{
		$html .= "<li><a href=''>".$i."</a></li>";
	}

	$html .=
		"</ul>

		<table border='1'>
			<thead>
				<tr>
					<th>leads_id</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>registered_datetime</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
		";

	foreach($users as $user)
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
	// echo $html;
?>
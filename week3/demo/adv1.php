
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Names Table in PHP</title>
	<style type="text/css">
	body {
		font-family: helvetica;
		color: #1a1a1a;
		font-size: 10pt;
	}
	table {
		border-collapse: collapse;
	}
	table tr td {
		border: 1px solid silver;
		padding: 5px 15px; 
	}
	table tr:nth-child(1) {
		font-weight: bold;
	}
	table td:nth-child(1) {
		font-weight: bold;
	}
	table tr:nth-child(5n +6) {
			background-color: #333333;
			color: white;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<td>User #</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Full Name</td>
			<td>Full Name in upper case</td>
			<td>Length of name</td>
		</tr>
		<?php
			$users = array( 
			   array('first_name' => 'Michael', 'last_name' => ' Choi '),
			   array('first_name' => 'John', 'last_name' => 'Supsupin'),
			   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
			   array('first_name' => 'KB', 'last_name' => 'Tonel'),
			   array('first_name' => 'Bill', 'last_name' => ' Clinton'),
			   array('first_name' => 'Michele', 'last_name' => 'Obama'), 
			   array('first_name' => 'John', 'last_name' => ' Carter'),
			   array('first_name' => 'Al', 'last_name' => 'Gore'),
			   array('first_name' => 'Barak', 'last_name' => ' Obama'),
			   array('first_name' => 'George', 'last_name' => 'Washington'),
			); 
			// $first = $users('first_name');
			// $last = $users('last_name');
			
			for ($i=0; $i < count($users) ; $i++)
			{ 
			echo "<tr> <td>" . ($i + 1)  . "</td>";
			echo "<td>" . $users[$i]['first_name'] . "</td>";
			echo "<td>" . $users[$i]['last_name'] . "</td>";
			echo "<td>" . $users[$i]['first_name'] . " " . $users[$i]['last_name'] . "</td>";
			echo "<td>" . strtoupper($users[$i]['first_name'] . " " . $users[$i]['last_name']). "</td>";
			echo "<td>" . strlen(trim($users[$i]['first_name']) . " " . trim($users[$i]['last_name'])). "</td>";
			echo "</tr>";
			}
			foreach ($users as $user) {
			    // echo "<pre>";

			    // var_dump( $user );
			    // echo "</pre>";
			    echo "$user[first_name]";
			    
			    // foreach ($user as $key => $value) {
			    	
			    // 	echo "First name is $key. Last name is : $value </br>";
			    // }
			}

		?>

		


	</table>

	
</body>
</html>
<?php
	// Includes the connection.php for us to be able to query to the base and use functions.
	require_once('connection.php');
	
	// Here we set the $date_from and $date_to variables from the $_POST variables ('date_from' and 'date_to').
	$date_from = $_POST['date_from'];
	$date_to = $_POST['date_to'];

	// If the $_POST variables (date_from and date_to) are empty, we set the default values of $date_from and $date_to.
	if(empty($_POST['date_from']) OR empty($_POST['date_to']))
	{
		$date_from = $_POST['date_from'];
		$date_to = date("Y-m-d H:i:s");
	}

	// Here we get all the records based on the search results provided.
	$total_rows_query = "SELECT * FROM leads
						WHERE (first_name LIKE '". $_POST['name'] ."%'
						OR last_name LIKE '". $_POST['name'] ."%')
						AND (registered_datetime BETWEEN '". $date_from ."' AND '". $date_to ."')";
	
	// We set the rows to be displayed per page.
	$rows_per_page = 3;

	// Now we count all the records fetched by using the count() function.
	// Inside the count() function is the fetch_all($total_rows_query) function that gets all the records based on the query of the $total_rows_query variable.
	$total_rows = count(fetch_all($total_rows_query));

	// Here is the computation for getting the page numbers to be displayed.
	$page_limit = ceil($total_rows / $rows_per_page);

	// We reused the $total_rows_query variable we had above and we add a LIMIT to the query based on the $rows_per_page variable we've provided.
	$leads_query =  $total_rows_query . " LIMIT ". ($_POST['page_number'] - 1) * ($rows_per_page) .", 10";

	// Now we get all records based on the $leads_query variable.
	$leads = fetch_all($leads_query);

	// Returns pagination to NULL by default so that if there are no leads found, it will return NULL.
	$data['pagination'] = NULL;

	// Here we check if there are leads found based on the search criteria.
	if($leads)
	{	
		// Now we append the opening tag of the pagination div to the $data['pagination'] variable
		// .= means append to variable (for variables that are declared only)
		// The pagination div will then be appended to the page using JQuery.
		$data['pagination'] .= '<div class="pagination">
									<ul>';

		// Now we count the number of pages needed and display it on the pagintaion div.
		for($i = 1;$i <= $page_limit;$i++)
		{
			$data['pagination'] .= '<li><a class="page" href="#">'. $i .'</a></li>';
		}

		// Closing tag of the pagination
		$data['pagination'] .= '		</ul>
								</div>';

		// We set the table to the $data['leads'] variable to be appended later to the page using JQuery.
		$data['leads'] = '<table id="leads_table" class="table">
								<thead>
									<tr>
										<th>Leads ID</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Registered Datetime</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>';

		// Now we count the number of leads and append it to the $data['leads'] table.
		foreach($leads as $lead)				
		{
			$data['leads'] .= '<tr>
									<td>'. $lead['leads_id'] .'</td>
									<td>'. $lead['first_name'] .'</td>
									<td>'. $lead['last_name'] .'</td>
									<td>'. $lead['registered_datetime'] .'</td>
									<td>'. $lead['email'] .'</td>
								</tr>';
		}

		// Closing tag of the leads table
		$data['leads'] .= '		</tbody>
							</table>';
	}
	// If there are no leads found based on the search criteria, we display a no results found div.
	else
	{
		$data['leads'] = '<div class="well">
								<h3>No results found</h3>
							</div>';
	}

	echo json_encode($data);
?>
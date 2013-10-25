<?php
	require_once('connection.php');

	// Checks if $_POST variable is set.
	if(isset($_POST))
	{
		// Checks if the description given was NULL.
		if($_POST['description'] != NULL)
		{
			// Query for inserting a post into the database.
			$query = "INSERT INTO posts (description, created_at)
						VALUES('". $_POST['description'] ."', NOW())";

			// Runs the query provided and then processed by the MySQL server.
			mysql_query($query);

			// Checks if there are affected rows.
			if(mysql_affected_rows() > 0)
			{
				// Sets the status to TRUE if there were affected rows. Then variable is then sent to the Javascript via json.
				$data['status'] = TRUE;

				// Saves the post to be appended to the HTML page.
				$data['post'] = '<div class="well post pull-left">
									<p>'. $_POST['description'] .'</p>
								</div>';
			}
			else
			{
				// Sets the status to FALSE if something went wrong with the insertion of data to the database.
				$data['status'] = FALSE;

				// Sets an error message to be displayed.
				$data['message'] = 'Something went wrong while adding your note.';
			}
		}
		else
		{
			// Sets the status to FALSE when $_POST data is not set.
			$data['status'] = FALSE;
		}
	}
	
	echo json_encode($data);
?>
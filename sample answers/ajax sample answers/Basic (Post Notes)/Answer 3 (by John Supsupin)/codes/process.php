<?php
	require_once('connection.php');	
	
	//add new post
	if(isset($_POST['new_note']))
	{
		if($_POST['new_note'] != '')
		{
			$add_note_query = "INSERT INTO notes (description, created_at) 
							   VALUES ('".mysql_real_escape_string($_POST['new_note'])."', now())";
							   
			$add_note = mysql_query($add_note_query);
			
			if($add_note)
			{
				$data['status'] = TRUE;
				$data['success_message'] = "Note successfully added";
				$data['note_description'] = "<td>". $_POST['new_note'] ."</td>";
			}
			else
			{
				$data['status'] = FALSE;
				$data['error_message'] = "Fatal Error: Database or notes table does not exist";
			}
			
			echo json_encode($data);
		}
		else
		{
			$data['status'] = FALSE;
			$data['error_message'] = "Note is too short";
			
			echo json_encode($data);
		}
	}
	
	//get all post
	if(isset($_POST['get_all_post']))
	{
		$notes = fetch_all("SELECT * FROM notes");
					
		if(count($notes) > 0)
		{
			$data['status'] = TRUE;
			$data['notes'] = '';
			
			foreach($notes as $note)
			{
				$data['notes'] .= "<td>". $note['description'] ."</td>";
			}	
		}
		else
		{
			$data['status'] = FALSE;
			$data['error_message'] = "<p>No notes available.</p>";
		}
		
		echo json_encode($data);
	}
	
?>



	
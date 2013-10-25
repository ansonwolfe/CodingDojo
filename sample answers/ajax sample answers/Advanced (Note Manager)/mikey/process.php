<?php
	require_once("connection.php");

	// Process creation of note
	if(isset($_POST['title'])) 
	{
		if($_POST['title'] != NULL)
		{
			$query = "INSERT INTO notes (title, created_at)
						VALUES('". mysql_real_escape_string($_POST['title']) ."', NOW())";

			mysql_query($query);

			if(mysql_affected_rows() > 0)			
			{
				$data['status'] = TRUE;
				$data['note'] = '<div class="row-fluid">
									<div class="offset3 span6 offset3 well">
										<h3 class="pull-left">'. $_POST['title'] .'</h3>
										<form class="delete_note" action="process.php" method="post">
											<button class="btn btn-link pull-right">delete</button>
											<input type="hidden" name="action" value="delete">
											<input type="hidden" name="note_id" value="'. mysql_insert_id() .'">
										</form>
										<div class="clearfix"></div>
										<form action="process.php" method="post" class="edit_note form-horizontal">
											<div class="control-group">
												<textarea name="description" placeholder="Please enter your description..."></textarea>
											</div>
											<input type="submit" value="Save" class="btn btn-success btn-mini">
											<input type="hidden" name="note_id" value="'. mysql_insert_id() .'">
										</form>
									</div>
								</div>';
			}
			else
			{
				$data['status'] = FALSE;
				$data['message'] = 'Something went wrong while adding your note.';
			}
		}
	}

	// Process edit note
	if(isset($_POST['description']))
	{
		$data['note'] = '<div class="note_description">
							<p></p>
							<button class="btn btn-mini btn-success edit_description">Edit</button>
						</div>';

		if($_POST['description'] != NULL OR $_POST['description'] != "")
		{
			$query = "UPDATE notes SET description = '". $_POST['description'] ."', updated_at = NOW()
						WHERE id = '". $_POST['note_id'] ."'";

			mysql_query($query);

			if(mysql_affected_rows() > 0)
			{
				$data['status'] = TRUE;
				$data['note_description'] = $_POST['description'];
			}
			else
			{
				$data['status'] = FALSE;
				$data['message'] = 'Something went wrong with your query.';
			}
		}
		else
		{
			$data['status'] = FALSE;
		}
	}

	if(isset($_POST['action']) && $_POST['action'] == 'delete')
	{
		$query = "DELETE FROM notes
					WHERE id = '". $_POST['note_id'] ."'";

		mysql_query($query);

		if(mysql_affected_rows() > 0)
		{
			$data['status'] = TRUE;
		}
		else
		{
			$data['status'] = FALSE;
			$data['message'] = 'Something went wrong while deleting your note.';
		}
	}

	echo json_encode($data);
?>
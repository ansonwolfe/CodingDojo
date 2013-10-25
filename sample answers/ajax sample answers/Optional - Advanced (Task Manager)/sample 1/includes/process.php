<?php
	require_once('connection.php');

	if(isset($_POST['create_task']) && $_POST['create_task'] == TRUE)
	{
		if($_POST['task_name'] != NULL)
		{
			$query = "INSERT INTO tasks (name, created_at)
						VALUES('". mysql_real_escape_string($_POST['task_name']) ."', NOW())";

			if(update_task($query))
			{
				$data['status'] = TRUE;
				$data['task'] = '<div class="control-group">
									<button class="btn btn-mini edit_task">Edit</button>
									<input type="checkbox" name="tasks[]">
									<input type="hidden" name="task_id" value="'. mysql_insert_id() .'">
									<input type="hidden" name="edit_task" value="1">
									<span>'. $_POST['task_name'] .'</span>
								</div>';
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
			$data['message'] = 'Please input a value!';
		}
	}

	if(isset($_POST['edit_task']) && $_POST['edit_task'] == TRUE)
	{		
		if(isset($_POST['tasks']))
		{
			$error_count = 0;

			foreach($_POST['tasks'] as $key => $value)
			{
				$query = "UPDATE tasks SET name = '". $value ."', updated_at = NOW()
							WHERE id = '". $key ."'";

				if(!update_task($query))
				{
					$error_count++;
				}
				else
				{
					$data['tasks'][$key] = $value;
				}
			}

			if($error_count > 0)
			{
				$data['status'] = FALSE;
			}
			else
			{
				$data['status'] = TRUE;
			}
		}
	}

	echo json_encode($data);
?>
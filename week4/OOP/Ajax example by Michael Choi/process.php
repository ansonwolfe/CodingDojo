<?php
	
	$results = array();

	if(isset($_POST['action']) && $_POST['action'] == "create_note")
	{
		$error = NULL;

		if(strlen($_POST['title']) == 0)
		{
			$error .= "Title is too short";
		}
		if(strlen($_POST['note']) == 0)
		{
			$error .= "<br />Note is too short";
		}

		if($error != NULL)
		{
			$results['errors'] = $error;
		}
		else
		{
			$html = '<div class="note">
				<h2>'.$_POST['title'].'</h2>
				<p>'.$_POST['note'].'</p>

				<div class="comments"></div>
				<form class="comment_form" action="process.php" method="post">
					<input type="hidden" name="action" value="create_comment" />
					<input type="text" name="comment" />
					<input type="submit" value="Post comment" />
				</form>

			</div>';
			$results['html'] = $html;
		}

	}
	else if(isset($_POST['action']) && $_POST['action'] == "create_comment")
	{
		if(strlen($_POST['comment']) == 0)
		{
			$error = "Comment needs to be made";
			$results['error'] = $error;
		}
		else
		{
			$html = "<p>{$_POST['comment']}</p>";
			$results['html'] = $html;
		}
	}
	
	echo json_encode($results);

?>
<?php

	require_once('connection.php');

	$query = "SELECT * FROM notes";
	$notes = fetch_all($query);

	foreach($notes as $note) { ?>
	<h3><?= $note['title'] ?></h3>
	<form class="update_note" action="process.php" method="post">
	<input type="hidden" name="action" value="update_note" />
	<input type="hidden" name="id" value="<?= $note['id'] ?>" />
	<textarea name="description"><?= $note['description'] ?></textarea>
	<input type="submit" value="Update" />
	</form>

	<form class="update_note" action="process.php" method="post">
	<input type="hidden" name="action" value="delete_note" />
	<input type="hidden" name="id" value="<?= $note['id'] ?>" />
	<input type="submit" value="Delete" />
	</form>
<?php
	}	?>

	<form class="update_note" action="process.php" method="post">
	<input type="hidden" name="action" value="create_note" />
	<input type="text" name="title" />
	<input type="submit" value="Add Note" />
	</form>

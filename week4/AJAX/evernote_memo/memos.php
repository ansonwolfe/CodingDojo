<?php
	include ('header.php');

	// query to pull all messages with users
	$memos = fetch_all("SELECT memos.id AS memo_id, memo, user_id, username, first_name, last_name , memos.created_at, memos.updated_at FROM memos LEFT JOIN users ON user_id = users.id ORDER BY memos.created_at DESC;");

	if(!isset($_SESSION['logged_in']))
	{
		header("Location: index.php");
	}

?>
<script>
	$(document).ready(function(){

		$('#memos_input').submit(function(){
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					$('#memos').html(data.html);
				},
				"json"
			);
			return false;
		});

		$('#memos_input').submit();

	});
	</script>
<!-- header -->
	<div class = "span12">
		  		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
		    <a class="brand" href="#">Wolfe's Tale</a>
		    <ul class="nav">
		      <li><a href="wall.php?id=<?= $_SESSION['id']?>">Message Wall</a></li>
		      <li class="active"><a href="memos.php?id=<?= $_SESSION['id']?>">Your Memos</a></li>
		    </ul>
		  </div>
		<div class="page-header">
	  		 <form action="registration.php" method="post">
	  			<input type="submit" value ="Log Out" name="logout" class="btn btn-info pull-right" >
	  		</form>
	  		<h1>Dog Memos!  <small>Welcome <?php echo $_SESSION['username']; ?>!</small></h1>
	  	</div>

	<div class="span3">
		<h3>Add a note:</h3>
		<form id="memos_input" action="memos_process.php" method="post">
			<input type="hidden" name="notes" value="notes">
			<textarea name="memo_entered"></textarea><br />
			<input type="submit" class="btn btn-info" value="Post It!">
		</form>
	</div>
	
	<div class="span8">
	<h3>My Posts:</h3>
		<div id="memos">
			<?php 
				foreach ($memos as $memo) {
					// formats the text to maintain line breaks as entered in text area.
					$mod_str = strtr($memo['memo'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />')); 
					echo "<div class='post_it span2 pull-left'>" . $mod_str . "</div>";

				}
			?>
		</div>
	</div>



</body>
</html>
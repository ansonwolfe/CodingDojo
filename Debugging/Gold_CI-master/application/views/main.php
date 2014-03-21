<?php
	#if (empty($_SESSION['gold'])) $_SESSION['gold'] = 0;
	if ($this->session->userdata('gold') == NULL)
	{
		$this->session->set_userdata('gold', 0);
	}
?>

<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<title>Gold game</title>

	<style type="text/css">
		body{
			font-family: lucida;
			background-color: rgb(200,200,80);
			color: black;
		}
		.row-fluid{
			text-align: center;
		}
		.row-fluid:first-child{
			text-align: left;
		}
		.well{
			margin-left: 50px;
			margin-top: 100px;
		}
		.well form{
			margin-top: 30px;
			padding-bottom: 20px;
		}
		#counter{
			margin-left: 200px;
			margin-top: 100px;
			font-size: 30px;
		}
		span{
			color: red;
		}
	</style>
</head>
<body class="container-fluid">
	<div class= "col-md-2">
	</div>
	<div class="row col-md-10">
		<div id="counter" class="row-fluid">
			<form>
				Your Gold:
				<input type="text" value=<?php echo $this->session->userdata('gold'); ?>>
			</form>
			<form action='<?php echo base_url('process/money')?>' method='post'>
				<input type="hidden" name="reset" value="reset">
				<input type="submit" value="Reset">
			</form>
		</div>
		<div class="row-fluid">
			<div class="col-md-2 well">
				<h2>Farm</h2>
				<h3>Earn 10-20 gold</h3>
				<form action='<?php echo base_url('process/money')?>' method='post'>
					<input type="hidden" name="building" value="farm">
					<input type="submit" value="Find Gold!">
				</form>
			</div>

			<div class="col-md-2 well">
				<h2>Cave</h2>
				<h3>Earn 5-10 gold</h3>
				<form action='<?php echo base_url('process/money')?>' method='post'>
					<input type="hidden" name="building" value="cave">
					<input type="submit" value="Find Gold!">
				</form>
			</div>

			<div class="col-md-2 well">
				<h2>House</h2>
				<h3>Earn 2-5 gold</h3>
				<form action='<?php echo base_url('process/money')?>' method='post'>
					<input type="hidden" name="building" value="house">
					<input type="submit" value="Find Gold!">
				</form>
			</div>

			<div class="col-md-2 well">
				<h2>Casino</h2>
				<h3>Earn/lose 0-50 gold</h3>
				<form action='<?php echo base_url('process/money')?>' method='post'>
					<input type="hidden" name="building" value="casino">
					<input type="submit" value="Find Gold!">
				</form>
			</div>
		</div>
		<div id="log" class="col-md-10">
			<textarea class="form-control" rows="8">
	<?php
		if(!empty($_SESSION['log'])){
			foreach($_SESSION['log'] as $log_row){
				echo $log_row;
				echo "\n";
			}
		}
	?>
			</textarea>
		</div>
	</div>
</body>

<html>
<head>
	<title></title>
  	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Bestel uw tickets</h1>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Aantal tickets:</label> 
					<form method="post">
						<p><input name="visitors" type="text" value="<?php if(isset($_POST['visitors'])){echo $_POST['visitors'];}else{echo 0;}?>" class="form-control">
						</p>
						<p><input name="ok" type="submit" value="Reserveer Plaatsen" class="form-control"></p>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
include "functions.php";
connectDB();
/*+++++++++++++++++++++++++++++++
++++++++ Show seats ++++++++++
+++++++++++++++++++++++++++++++*/
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Beschikbaarheid stoelen</h1>
			<?php
			//Remove last item of array
			showSeats();
			?>
		</div>
	</div>
</div>
<?php
orderTickets();


<?php

require "connection.php";
include "functions.php";

if(isset($_POST['submit'])){
	delete();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class=" container-fluid col-lg-6 mx-auto border border-success rounded-lg">
	<h1>DELETE</h1>
		<div>
			<form method="post" action="delete.php">
				<div class="form-group">
					<label>username</label>
		<input type="text" name="user" class="form-control">
				</div>
				<div class="form-group">
					<label>password</label>
			<input type="password" name="pass" class="form-control">
				</div>
				<select name="id" id="">
					<?php
					showData();
					?>
				</select>
				<input type="submit" name="submit" value="DELETEE" class="btn btn-primary">
			</form>
			</div>
	</div>
</body>
</html>


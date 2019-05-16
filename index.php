<!DOCTYPE html>
<?php
session_start();
?>
<?php
include("connection.php")
?>


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-fixed-top">
	  <img src="sm1.png">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse navbar-right" id="navbarText" >
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active ">
	        <a class="nav-link" href="#">Home</a>
	      </li>
	      <li>
	      	<a class="nav-link" data-toggle="modal" data-target="#modalLoginForm" data-whatever="@getbootstrap">Log in</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Campuses</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Courses</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Admission</a>
	      </li>
		  <li class="nav-item">
	        <a class="nav-link" href="#">About us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Mission/Vision</a>
	      </li>    
	    </ul>
	
	  </div>
	</nav>
	<div class="bg"></div>
	<form class="modalLog" method="post" action="index.php">
		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true" >
		  <div class="modal-dialog text-dark rounded" role="document">
		    <div class="modal-content">
			      <div class="modal-header text-dark" text-center">
			        <h1 class="modal-title w-80 font-weight-bold">Log in</h1>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body mx-2">
			        <div class="md-form mb-5">
			          <i class="fas fa-user"></i>
			          <input type="text" name="username" class="form-control validate">
			          <label data-error="wrong" data-success="right" for="defaultForm-username">Your username</label>
			 		</div>
			        <div class="md-form mb-2">
			          <i class="fas fa-lock prefix grey-text"></i>
			          <input type="password" name="password" class="form-control validate">
			          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
			        </div>
			      </div>
			      <div class="modal-footer d-flex justify-content-center">
			      	<input type="submit" name="login" value="Log in" class="btn">
			      </div>
		    </div>
		  </div>
		</div>
	</form>


</body>
</html>

<?php
	
if (isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

	$result = mysqli_query($connect,$query) or die (mysql_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if($num_row > 0){
		$_SESSION['id']=$row['id'];
		echo "<script>window.open('patientview.php','_self')</script>";

	}
	else{
		echo "<script>Swal.fire({
 			  title: 'Error!',
  			  text: 'Username or Password is incorrect!',
  			  type: 'error',
 			  confirmButtonText: 'Okay'
			  })</script>";
		}
	}

?>

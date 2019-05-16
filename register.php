
<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="left" >

  <form method='post' action="register.php" align="left">
    <h1>SIGN UP FORM</h1><br>
    <label for="username">Username</label>
    <input type="text"  name='username' placeholder="Username" required>
 
	<label for="password">Password</label>
    <input type="password"  name='password' placeholder="Password" required>
	<br>
    <label for="fname">First Name</label>
    <input type="text"  name='fname' placeholder="First Name" required>

    <label for="lname">Last Name</label>
    <input  type="text"  name='lname' placeholder="Last Name" required>
	<br>
    <label for="mname">Middle Name</label>
    <input type="text"  minlength="2" name='mname' placeholder="Middle Name" required>
	<label for="bday">Birthdate</label>
    <input type="date"  name='bday' placeholder="Birthdate" required>
    <label for="age">Age</label>
    <input type="number"  name='age' placeholder="Age" required>
	<br>
    <label for="gender">Gender</label>
	<select name="gender"  placeholder="Choose Gender" required>
	<option value="" selected disabled>Choose Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option></select>
    
	
    <label for="address">Address</label>
    <input type="text"  name='address' placeholder="Address" required>
	<br>
	<label for="gender">Grade Level</label>
	<select name="grade"  placeholder="Choose Grade Level" required>
	<option value="Grade1">Grade 1</option>
	<option value="Grade2">Grade 2</option>
	<option value="Grade3">Grade 3</option>
	<option value="Grade4">Grade 4</option>
	<option value="Grade5">Grade 5</option>
	<option value="Grade6">Grade 6</option>
	<option value="Grade7">Grade 7</option>
	<option value="Grade8">Grade 8</option>
	<option value="Grade9">Grade 9</option>
	<option value="Grade10">Grade 10</option>
	<option value="Grade11">Grade 11</option>
	<option value="Grade12">Grade 12</option></select>
	<br>
	<label for="guardian">Guardian Name</label>
    <input type="text"  name='guardian' placeholder="Guardian Name" required>
    <label for="relationship">Relationship</label>
    <input type="text"  name='relationship' placeholder="Relationship" required>
	<label for="contact">Contact No.:</label>
    <input type="number"  name='contact' placeholder="Contact No." required>
	
    <label for="email">Email</label>
    <input type="text"  name='email' placeholder="Email" required>
	<br><br>
	<p>Already have an account?  <b><a href="index".php" target="_blank">Sign in</a></b></p>
    <input type='submit' name='submit' value='Create Account!' />
  </form>

<br>
</body>
</html>
<?php
	
	if(isset ($_POST ['submit'])){		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fname = $_POST['fname'];
		$lname=$_POST['lname'];
		$mname=$_POST['mname'];
		$bday=$_POST['bday'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$grade=$_POST['grade'];
		$address=$_POST['address'];
		$guardian=$_POST['guardian'];
		$relationship=$_POST['relationship'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		
		
$email_ex = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_ex,$email)) {
	  
		echo "<script>alert('Email $email is not valid')</script>";
		exit();
  }

	$check_email ="select * From users where email='$email'";
	$run = mysqli_query($connect,$check_email);
	
	if(mysqli_num_rows($run)>0) {
		echo "<script>alert('Email $email is already exist in our database. Please try another one')</script>";
		exit();
		}
		
	$check_username="select * From users where username='$username'";
	$rn = mysqli_query($connect,$check_username);
	
	if(mysqli_num_rows($rn)>0){
		echo "<script>alert('Username $username is already exist in our database, plz try another one')</script>";
		exit();
		}
	$check_contact="select * From users where contact='$contact'";
	$r = mysqli_query($connect,$check_contact);
	
	if(mysqli_num_rows($r)>0){
		echo "<script>alert('contact $contact is already exist in our database, plz try another one')</script>";
		exit();
		}

	$query = "INSERT INTO users (username,password,fname,lname,mname,bday,age,gender,grade,address,guardian,relationship,contact,email) VALUES ('$username','$password','$fname','$lname','$mname','$bday','$age','$gender','$grade','$address','$guardian','$relationship','$contact', '$email')";
	$result = mysqli_query($connect, $query);	
	$query = "INSERT INTO usersback (username,password,fname,lname,mname,bday,age,gender,grade,address,guardian,relationship,contact,email) VALUES ('$username','$password','$fname','$lname','$mname','$bday','$age','$gender','$grade','$address','$guardian','$relationship','$contact', '$email')";
	$result = mysqli_query($connect, $query);	

	if ($result) {
		echo "<script> alert('Registration Complete!')</script>";	
	}

	
}		
?> 
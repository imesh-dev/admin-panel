<?php
session_start();
$error='';
$email='';
include('include/db.php');
if(isset($_POST['login']))
{
	if (empty($_POST['email']) || empty($_POST['password'])) {
	$error = "UserName or Password is invalid";
	}
	else
{
$email=$_POST['email'];
$password=md5($_POST['password']);
//echo $email;

$SESQuery = $con->query("SELECT * FROM admin_info WHERE admin_password ='$password' AND admin_email ='$email'");
$rows = $SESQuery->num_rows;
if ($rows == 1) {
	$_SESSION['alogin'] = 1;
while($row = $SESQuery->fetch_assoc())
{ 
	$_SESSION['Loged_id']= $row['admin_id'];
		$_SESSION['Loged_ad']= $row['admin_name'];

	 // Initializing Session
header("location: admin.php"); // Redirecting To Other Page
}
} else {
$error = "Username or Password is invalid";
}
$con->close(); // Closing Connection
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	<div class="col-sm-10 col-lg-10 col-md-10">
		<div class="jumbotron">
		<div class="form-group">
			<h1> Admin Login</h1>
		</div>
		<form action="" method="POST" class="form-horizontal">
		<?php echo "$error";?>
		<?php echo "$email";?>
			<div class="form-group input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-user"></span>
			</span>
			<input type="email" class="form-control" name="email" id="email"
			placeholder="Enter email address" required>
			</div>
			<div class="form-group input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-lock"></span>
			</span>
			<input type="password" class="form-control" name="password"
			placeholder="Enter your password" required>
			</div>
			<div class="form-group">
				<label><input Type="checkbox"> Remember me</label>
			</div>
			<div class="form-group">
				<button type = "submit" name="login" class="btn btn-primary">Login</button>
			</div>
		</form>
		</div>
	</div>
	</div>
</body>
</html>
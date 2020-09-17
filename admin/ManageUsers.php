<?php
session_start();
include('include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
$msg='';
if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from user_info  WHERE  user_id=".$delid."";
if($con->query($sql)) {
$msg="User deleted successfully";
} else{
$msg = "something went wrong!";
}
	}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
<meta name = "viewport" content="width = device-width, initial-scale = 1">
<title>Test Web Site</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="style/css/style2.css">
<script src="style/js/all.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("include/side_bar.php");?>
<?php include("include/header.php");?>

<!--cards-->
<!--end of cards-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-9 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">

                </div>
            </div>
        </div>
    </div>
</section>
<!--end of card-->

<!--tables-->
<section>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-lg-10 ml-auto">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="text-muted text-center mb-3">Manage Users</h3>
                        <table class="table table-striped bg-light text-center">
						<?php echo $msg; ?>
                            <thead>
                                <tr class="text-muted">
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
									<th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$sql = "SELECT * FROM user_info";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["user_id"]."</td><td>".$row["first_name"]." ".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["mobile"]."</td>
										
										<td><a href='ManageUsers.php?del=".$row["user_id"]."' onclick=\" return confirm('Do you want to delete');\"><i class='fa fa-window-close'></i></a></td>
										
										
										</tr>";
										}
									}
								?>
                            </tbody>
                        </table>

                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
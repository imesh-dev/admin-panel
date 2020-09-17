<?php
session_start();
include('include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
$msg='';

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$pass2=$_POST['password2'];


//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"img/".$pic_name);
if($pass==$pass2){
$passen=md5($pass);	
mysqli_query($con,"insert into admin_info (admin_id,admin_name,admin_email,admin_password,image) values ('','$name','$email','$passen','$pic_name')") or die ("query incorrect");
}
else{
	$msg="Passwords dosent match";
}
$msg="New admin user successfully created";
}

mysqli_close($con);
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
<!-- <script src="style/js/bootstrap.min.js"></script> -->
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
            <div class="col-lg-10 col-md-9 ml-auto content">
            <!-- <div class="col-md-9 content" > -->
  	            <div class="panel panel-default">
	                <div class="panel-heading" style="background-color:#c4e17f">
	                <h1><span><i class="fa fa-tag" style="margin-left:10px;"></i></span> Add new admin </h1>
                    </div><br>
                    <?php echo $msg; ?>
	                <div class="panel-body" style="background-color:#E6EEEE;">
                    <div class="row align-items-center">
		                <div class="col-7">
                            <div class="card bg-light card-body" style="margin-top:20px; margin-left:50px;">
					
                            <form action="" method="post" name="form" enctype="multipart/form-data">
                                <p>Name</p>
                                <input class="input-lg thumbnail form-control" type="text" name="name" id="name" autofocus style="width:100%" placeholder="Name" required>
                                <p>Email</p>
                                <input class="input-lg thumbnail form-control" type="email" name="email" id="email" autofocus style="width:100%" placeholder="Email" required>
                                <p>Password</p>
                                <input class="input-lg thumbnail form-control" type="password" name="password" id="password" autofocus style="width:100%" placeholder="Email" required>
                                <p>Confirm Password</p>
                                <input class="input-lg thumbnail form-control" type="password" name="password2" id="password2" autofocus style="width:100%" placeholder="Email" required>
                                
								<p>Add Image</p>
                                    <div style="background-color:#CCC">
                                        <input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
                                    </div>
                            </div>

                        
                        
                        
                        <div align="center" style="margin-top:20px;">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width:100px; height:60px"> Cancel</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px"> Add Admin</button>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
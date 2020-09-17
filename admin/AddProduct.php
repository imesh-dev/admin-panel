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
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$pricing=$_POST['pricing'];
$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
mysqli_query($con,"insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords,pricing) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags','$pricing')") or die ("query incorrect");

$msg="Product was successfully added";
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
	                <h1><span><i class="fa fa-tag" style="margin-left:10px;"></i></span> Product / Add Product  </h1>
                    </div><br>
                    <?php echo $msg; ?>
	                <div class="panel-body" style="background-color:#E6EEEE;">
                    <div class="row align-items-center">
		                <div class="col-7">
                            <div class="card bg-light card-body" style="margin-top:20px;">
                            <form action="add_product.php" method="post" name="form" enctype="multipart/form-data">
                                <p>Title</p>
                                <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" autofocus style="width:100%" placeholder="Product Name" required>
                                <p>Description</p>
                                <textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>
                                <p>Add Image</p>
                                    <div style="background-color:#CCC">
                                        <input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
                                    </div>
                            </div>

                            <div class="card bg-light card-body" style="margin-top:20px;">
                                <h3>Pricing</h3>
                                <p>Price</p>
                                    <div class="input-group-btn">
                                        <div class="input-group-prepend"><span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" name="price" id="price"  placeholder="0.00" required>
										<select class="form-control" name="pricing" id="pricing" required >
										<option value="1 kg"> 1 Kg </option>
										<option value="1 unit"> 1 Unit </option>
										</select> </div>
                                    </div><br>
                            </div>
                        </div>  
                        <div class="col-5">
                        <div class="card bg-light card-body" style="margin-top:20px;">
                            <div class="well">
                                <h3>Category</h3>  
                                <p>Category Type</p>
                                <!-- <input type="number" name="product_type" id="product_type" class="form-control" placeholder="1 electronic,2 Ladies Wears,3 Mens Wear"> -->
                                <div class="form-group">
                                <select class="form-control" name="product_type" id="product_type" required>
                                    <option value=""> Select </option>
                                    <?php $ret="select  cat_id,cat_title  from categories";
                                    $results = $con->query($ret);
                                    if ($results->num_rows > 0) {
                                        while($row = $results->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_title"]; ?></option>
                                    <?php }} ?>

                                    </select>
                                    </div>
                                <br>
                                <p>Vendor / Brand</p>
                                <div class="form-group">
                                <select class="form-control" name="brand" id="brand" required>
                                    <option value=""> Select </option>
                                    <?php $ret="select   brand_id,brand_title   from brands";
                                    $results = $con->query($ret);
                                    if ($results->num_rows > 0) {
                                        while($row = $results->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row["brand_id"]; ?>"><?php echo $row["brand_title"]; ?></option>
                                    <?php }} ?>

                                    </select>
                                    </div>
                               
                                <br>
                                <p>Other tags</p>
                                <input type="text" name="tags" id="tags" class="form-control" placeholder="Summer, Soft, Cotton etc">
                            </div>          
                        </div>
                        <div align="center" style="margin-top:20px;">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width:100px; height:60px"> Cancel</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px""> Add Product</button>
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
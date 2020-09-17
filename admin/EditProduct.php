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
// $c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];
$pid=intval($_GET['id']);
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
}else{
	$picd=$_POST['pic'];
	$pic_name=$picd;
}	
    $updatest = "UPDATE products SET product_cat = '$product_type', product_brand = '$brand',product_title = '$product_name',product_price = '$price', product_desc = '$details' ,product_keywords = '$tags',pricing = '$pricing',product_image='$pic_name' WHERE product_id ='$pid'";

    mysqli_query($con,$updatest ) or die ("query incorrect");
header('location:ManageProducts.php');
$msg="Product was successfully Updated";
}

mysqli_close($con);

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
	                <h1><span><i class="fa fa-tag" style="margin-left:10px;"></i></span> Product / Update Product  </h1>
                    </div><br>
                    <?php 

                    $pid=intval($_GET['id']);
                    $sqlm ="SELECT *  from products where product_id=".$pid;

                    $resultsmain = $con->query($sqlm);
                                    if ($resultsmain->num_rows > 0) {
                                        while($row = $resultsmain->fetch_assoc()) {
?>                    

	                <div class="panel-body" style="background-color:#E6EEEE;">
                    <div class="row align-items-center">
		                <div class="col-7">
                            <div class="card bg-light card-body" style="margin-top:20px;">
                            <form  method="post" name="form" enctype="multipart/form-data">
                                <p>Title</p>
                                <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" value="<?php echo $row["product_title"]; ?>" autofocus style="width:100%" placeholder="Product Name" required>
                                <p>Description</p>
                                <textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required><?php echo $row["product_desc"]; ?></textarea>
                                <p>Change Current Image</p>
								<div align="center"><img src='../product_images/<?php echo $row["product_image"]; ?>' width='150' height='150' style="padding-bottom:10px;">
								<input type="hidden" name="pic" value="<?php echo $row["product_image"];?>" /></div>
                                    <div style="background-color:#CCC">
                                        <input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
                                    </div>
                            </div>

                            <div class="card bg-light card-body" style="margin-top:20px;">
                                <h3>Pricing</h3>
                                <p>Price</p>
                                    <div class="input-group-btn">
                                        <div class="input-group-prepend"><span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" name="price" id="price" value="<?php echo $row["product_price"]; ?>" placeholder="0.00" required>
											<select class="form-control" name="pricing" id="pricing" required >
										<option value="<?php echo $row["pricing"]; ?>"><?php echo $row["pricing"]; ?></option>
										<option value="1 unit"> 1 Unit </option>
										<option value="1 Kg"> 1 Kg </option>
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
                                <?php $ret="select cat_title  from categories where cat_id=".$row["product_cat"];
                                    $results2 = $con->query($ret);
                                    if ($results2->num_rows > 0) {
                                        while($row2 = $results2->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row["product_cat"]; ?>"> <?php echo $row2["cat_title"]; ?> </option>
                                    <?php } } ?>
                                    <?php $ret="select  cat_id,cat_title  from categories";
                                    $results = $con->query($ret);
                                    if ($results->num_rows > 0) {
                                        while($row3 = $results->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row3["cat_id"]; ?>"><?php echo $row3["cat_title"]; ?></option>
                                    <?php }} ?>

                                    </select>
                                    </div>
                                <br>
                                <p>Vendor / Brand</p>
                                <!-- <input type="number" name="brand" id="brand" class="form-control" placeholder="1 HP,2 Samsung,3 Apple,4 motorolla"> -->
                                <div class="form-group">
                                <select class="form-control" name="brand" id="brand" required>
                                <?php $ret="select brand_title  from categories where brand_id=".$row["product_brand"];
                                    $results2 = $con->query($ret);
                                    if ($results2->num_rows > 0) {
                                        while($row2 = $results2->fetch_assoc()) {
                                    ?>
                                     <option value="<?php echo $row["product_brand"]; ?>"> <?php echo $row2["brand_title"]; ?> </option>
                                     <?php } } ?>
                                    <?php $ret="select   brand_id,brand_title   from brands";
                                    $results = $con->query($ret);
                                    if ($results->num_rows > 0) {
                                        while($row5 = $results->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row5["brand_id"]; ?>"><?php echo $row5["brand_title"]; ?></option>
                                    <?php }} ?>

                                    </select>
                                    </div>
                               
                                <br>
                                <p>Other tags</p>
                                <input type="text" name="tags" id="tags" value="<?php echo $row["product_keywords"]; ?>" class="form-control" placeholder="Summer, Soft, Cotton etc">
                            </div>          
                        </div>
                                        <?php }} ?>
                        <div align="center" style="margin-top:20px;">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width:100px; height:60px"> Cancel</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px""> Update Product</button>
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
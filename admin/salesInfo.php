<?php
session_start();
include('include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
$msg='';
$oid=intval($_GET['oid']);
echo $oid;
if(isset($_POST['submit']))
{

    $updatest = "UPDATE orders_info SET state = 'Aproved' where order_id=".$oid;

    mysqli_query($con,$updatest ) or die ("query incorrect");
header('location:ViewOrders.php');
$msg="Product was successfully Updated";
// 

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
	                <h1><span><i class="fa fa-tag" style="margin-left:10px;"></i></span> Order details  </h1>
                    </div><br>
                    <?php 

                    
                    //echo $oid;
                    $sqlm ="SELECT *  from orders_info where order_id=".$oid;
                   // echo $sqlm;
                    $resultsmain = $con->query($sqlm);
                                    if ($resultsmain->num_rows > 0) {
                                        while($row = $resultsmain->fetch_assoc()) {
?>                    

	                <div class="panel-body" style="background-color:#E6EEEE;">
                    <div class="row align-items-center">
		                <div class="col-12">
                            <div class="card bg-light card-body" style="margin-top:20px;">
                            <table class="bg-light" style = "width:100%;">
                            <tr>
                            <td>Full Name </td> <td><?php echo $row["f_name"]; ?></td> <td>Address</td><td><?php echo $row["address"]; ?></td>
                            </tr>
                            <tr>
                            <td>E-mail </td> <td><?php echo $row["email"]; ?></td> <td>City</td><td><?php echo $row["city"]; ?></td>
                            </tr>
                            <tr>
                            <td></td> <td></td> <td>State</td><td><?php echo $row["state"]; ?></td>
                            </tr>
                            <tr>
                            <td> </td> <td></td> <td>Zip</td><td><?php echo $row["zip"]; ?></td>
                            </tr>
                            <tr style="border-bottom:2px solid grey"></tr>
                            <tr>
                            <td>Card Name </td> <td><?php echo $row["cardname"]; ?></td> <td>Card Number</td><td><?php echo $row["cardnumber"]; ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                            <td>Number of Products </td> <td><?php echo $row["prod_count"]; ?></td> <td>Total</td><td style="border-bottom: 2px solid grey"><?php echo $row["total_amt"]; ?></td>
                            </tr>
                            </table>
                              </div>
                              <?php }} ?>
                        
                              <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="text-muted text-center mb-3">Order Information</h3>
                        <table class="table table-striped bg-light text-center">
				
                            <thead>
                                <tr class="text-muted">
                                    <th>Product</th>
                                    <th>category</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$sql = "SELECT order_products.qty,order_products.amt,products.product_title,products.product_price,categories.cat_title 
                                FROM order_products Left Join products on order_products.product_id = products.product_id Left Join categories on 
                                products.product_cat=categories.cat_id WHERE order_id=".$oid;
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["product_title"]."</td><td>".$row["cat_title"]."</td><td> ".$row["product_price"]."</td><td>".$row["qty"]."
										
										</td><td> ".$row["amt"]."</td>
										
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
            </div>
			
			
			</div>
		
    </div>
</section>
</body>
</html>
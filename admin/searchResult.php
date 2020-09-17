<?php
session_start();
include('include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
$sql="";
$msg="";
if(isset($_POST['submit']))
{
	
	$searcht=$_POST['searchtm'];
	$sql22 = " SELECT products.product_id,categories.cat_title,brands.brand_title,products.product_title,products.product_price FROM products LEFT JOIN brands ON products.product_brand = brands.brand_id left join categories on products.product_cat=categories.cat_id where products.product_title LIKE '%".$searcht."%'";
	
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
                        <h3 class="text-muted text-center mb-3">Search results</h3>
                        <table class="table table-striped bg-light text-center">
						<?php echo $msg; ?>
                            <thead>
                                <tr class="text-muted">
                                    <th>Product title</th>
                                    <th>product price</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							
								<?php
								$result = $con->query($sql22);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["product_title"]."</td><td>".$row["product_price"]."</td><td> ".$row["brand_title"]."</td><td>".$row["cat_title"]."
										
										<td><a href='EditProduct.php?id=".$row["product_id"]."'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;
<a href='ManageProducts.php?del=".$row["product_id"]."' onclick=\" return confirm('Do you want to delete');\"><i class='fa fa-window-close'></i></a></td>
										
										
										</tr>";
										}
									} else{
										echo "<h4>Sorry No result For the given query</h4>";
									}
								?>
                            </tbody>
                        </table>

                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        <span>&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                        <a href="#" class="page-link py-2 px-3">
                                            1
                                        </a>
                                    </li>
                                    <li class="page-item">
                                            <a href="#" class="page-link py-2 px-3">
                                                2
                                            </a>
                                        </li>
                                <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            <span>&raquo;</span>
                                        </a>
                                    </li>
                            </ul>                           
                        </nav>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
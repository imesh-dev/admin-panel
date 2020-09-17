<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name = "viewport" content="width = device-width, initial-scale = 1">
<title>Admin Panel</title>
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
                    <div class="col-lg-3 col-sm-6 p-2">
                        <a href="ViewOrders.php"><div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-shopping-cart fa-3x
                                    text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Orders</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fas fa-sync mr-3"></i>
                                <span>Manage</span>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 p-2">
                            <div class="card card-common">
                               <a href="ManageProducts.php"> <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-shopping-bag fa-3x
                                        text-success"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Products</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Update Now</span> 
                                </div></a>
                            </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <a href="ManageUsers.php"><div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x
                                        text-info"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Users</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Manage</span>
                                </div></a>
                            </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <a href="Sales.php"><div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-chart-line fa-3x
                                        text-danger"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Sales</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>View</span>
                                </div></a>
                            </div>
                    </div>
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
                    <div class="col-lg-12 col-12">
                        <h3 class="text-muted text-center mb-3">Latest Orders</h3>
                        <table class="table table-dark table-hover text-center">
                             <thead>
                                <tr class="text-muted">
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$sql = "SELECT * FROM orders_info order by order_id DESC LIMIT 3";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["f_name"]."</td><td>".$row["email"]."</td><td> ".$row["city"]."</td><td><span class='badge badge-success w-75 py-2'>".$row["state"]."
										
										</span> </td><td>".$row["total_amt"]."</td><td><a href='OrderInfo.php?oid=".$row["order_id"]."'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;
<a href='ManageProducts.php?del=".$row["order_id"]."' onclick=\" return confirm('Do you want to delete');\"><i class='fa fa-window-close'></i></a></td>
										
										
										</tr>";
										}
									}
								?>
                            </tbody>
                        </table>
                        <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a href="ViewOrders.php" class="page-link py-2 px-3">
                                            <span>View more</span>
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
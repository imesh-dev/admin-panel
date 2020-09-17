<?php 
include('include/db.php');
?>
<nav class="navbar navbar-expand-md navbar-light">
<button class="navbar-toggler ml-auto mb-2 bg-light" 
type="button" data-toggle="collapse" data-target="#myNavbar">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
        <div class="row">
            <!-- side bar-->
            <div class="col-xl-2 col-lg-2 col-md-3 sidebar fixed-top">
                <a href="#" class="navbar-brand text-white d-block mx-auto
                text-center oy-3 mb-4 b-border">Admin Panel</a>
                <div class="b-border pb-3">
				<?php
				$adname = $_SESSION['Loged_ad'];
				$adid = $_SESSION['Loged_id'];
				$imagen = '';
				$sql = "Select image from admin_info where admin_id='$adid'";
			$result = $con->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$imagen = $row["image"];
									}
								}
							?>
                    <img src='img/<?php echo $imagen; ?>' width="60" height="60" class="rounded-circle mr-3">
                    <a href="#" class="text-white" style="text-decoration:none;"><?php echo $adname; ?></a>
                </div>
                <ul class="navbar-nav flex-column mt-3">
                    <li class="nav-item"><a href="admin.php" class="nav-link text-white  p-3
                        mb-1 sidebar-link"><i class="fas fa-home test-light fa-lg mr-3"></i> <!--for current use "current" class instead sidebar-linnk-->
                    Dashboard</a></li>
                    <li class="nav-item"><a href="ManageUsers.php" class="nav-link text-white   p-3
                        mb-1 sidebar-link"><i class="fas fa-user test-light fa-lg mr-3"></i>
                    Manage Users</a></li>
                    <li class="nav-item"><a href="ManageProducts.php" class="nav-link text-white  p-3
                        mb-1 sidebar-link"><i class="fas fa-shopping-bag test-light fa-lg mr-3"></i>
                    Products</a></li>
                    <li class="nav-item"><a href="ViewOrders.php" class="nav-link text-white  p-3
                        mb-1 sidebar-link"><i class="fas fa-shopping-cart test-light fa-lg mr-3"></i>
                    Orders</a></li>
                    <li class="nav-item"><a href="Sales.php" class="nav-link text-white p-3 
                        mb-1 sidebar-link"><i class="fas fa-chart-line test-light fa-lg mr-3"></i>
                    Sales</a></li>
                    <li class="nav-item"><a href="AddProduct.php" class="nav-link text-white p-3 
                        mb-1 sidebar-link"><i class="fas fa-plus test-light fa-lg mr-3"></i>
                    Add Products</a></li>
					<li class="nav-item"><a href="ManageAdmins.php" class="nav-link text-white p-3 
                        mb-1 sidebar-link"><i class="fas fa-wrench test-light fa-lg mr-3"></i>
                    Manage Admins</a></li>
                </ul>
            </div>
		</div>
	</div>
</div>
</nav>
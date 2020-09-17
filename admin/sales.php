<?php
session_start();
include('include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
$msg='';
$total ='';

if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$sql = "SELECT * FROM orders_info where adate<='$todate' and adate>='$fromdate' and state='Aproved'";

} else {
	
$sql = "SELECT * FROM orders_info where state='Aproved'";
	
}

?>	
<!DOCTYPE html>
<html lang="en">
<head>
<meta name = "viewport" content="width = device-width, initial-scale = 1">
<title>Sales Report</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="style/css/style2.css">
<script src="style/js/all.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("include/side_bar.php");?>
<?php include("include/header.php");?>
<script>
    function PrintElem(elem)
    {
      var mywindow = window.open('', 'PRINT', 'height=400,width=720');


        mywindow.document.write('<html><head><title>' + document.title  + '</title>');

        mywindow.document.write("</head><link rel='stylesheet' href='style/css/bootstrap.css'><body >");
      mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        return true;

        }
		</script>
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
            <div class="col-lg-10 ml-auto" id='sales_report' >
			<h3 class="text-muted text-center mb-3">Sales</h3>
                <div class="row align-items-center">
					<?php if(isset($_POST['submit']))
								{
								$fromdate=$_POST['fromdate'];
								$todate=$_POST['todate'];
								
					echo "<div class='col-lg-4 col-sm-4' >
					<form method='post'>
					<div class='form-group'> 
					From :<input type='date' class='form-control' name='fromdate' value='$fromdate' required></div></div>
										  
										<div class='col-lg-4 col-sm-4'>
										<div class='form-group'> 
										  To :<input type='date' class='form-control' name='todate' value='$todate' required>
										</div></div>";
							} else {
								echo "<div class='col-lg-4 col-sm-4' ><div class='form-group'> From :<input type='date' class='form-control' name='fromdate' placeholder='From' required></div></div>
									
										<div class='col-lg-4 col-sm-4'>
										<div class='form-group'> 
										  To :<input type='date' class='form-control' name='todate' placeholder='TO' required>
										</div></div>";
							}
							?>
							<div class="col-lg-2 col-sm-2" >
							<button type="submit" name="submit" id="submit" class="btn btn-info" style=" float:center; margin-top:10px; width:100px; height:50px"> view</button>
							</form></div><div class="col-lg-2 col-sm-2" >
							<button type="button" class="btn btn-danger" onclick="PrintElem('sales_report','sales_table');" style=" float:left; margin-top:10px; width:100px; height:50px">Print</button>
								</div>
								</div>
								
								<div class="row align-items-center">
                        <table class="table table-striped bg-light text-center">
						<?php echo $msg; ?>
						
                            <thead>
                                <tr class="text-muted">
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$sql = "SELECT * FROM orders_info where state='Aproved'";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["f_name"]."</td><td>".$row["email"]."</td><td> ".$row["city"]."</td><td>".$row["state"]."</td><td>".$row["adate"]."</td><td>".$row["total_amt"]."</td><td><a href='salesInfo.php?oid=".$row["order_id"]."'><i class='fa fa-edit fa-1x' style='width:25px;'></i></a>&nbsp;&nbsp;</td>
										</tr>";
										$total = $row["total_amt"]+$total;
										}
									}
								?>
								<tr><td></td><td><strong>Total for time period</strong></td><td></td><td></td><td></td><td style="border-bottom: 5px solid black; border-top: 3px solid black;"><?php echo $total; ?></td><td></td></tr>
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
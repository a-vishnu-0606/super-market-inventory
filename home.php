<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	body {
	background-image: url("pic.jpg");
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
}


	.card-body{
		color: black;
		font-size: 18px;
	}
	
</style>
</head>
<body>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
	</div>
</div>

<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
			<t>
			<b><?php echo "Welcome back ".$_SESSION['login_name']."!"  ?></b>
								
			</div>
			<hr>
			<div class="alert alert-success col-md-4 ml-4">
				<p><b><large>Total Sales Today</large></b></p>
			<hr>
				<p class="text-right"><b><large><?php 
				include 'db_connect.php';
				$sales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
				echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";

				 ?></large></b></p>
			</div>
		</div>
		
	</div>
	</div>
</div>
</div>
<script>
</script>
</body>
</html>


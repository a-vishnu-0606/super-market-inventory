<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VVV | Super Market Management System</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
	}
	#login-right{
		position: fixed;
		right:280px;
		width:20%;
		height: 900px;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: fixed;
		left:0;
		width:30%;
		height: calc(100%);
		align-items: center;

	}
	form#login-form .form-control {
    background-color: #292825;
	color: #eeba2b;
}
.card-body {
  background-color: #d7d7d5;
}
.card col-md-8{
	background-color: #d7d7d5;
}
button.btn-primary {
  background-color: #292825;
  color:#eeba2b;
}

button.btn-primary:hover {
  background-color: #eeba2b;
  color:#292825;
  transition: all 0.3s ease;
}
label.control-label {
		font-weight: bold;
		font-size: 18px;
	}
	button.btn-primary {
		font-weight: bold;
		font-size: 18px;
	}
	
</style>

<body>


  <main id="main" >
  		<div id="login-left">
		  <img src="vdv.gif.gif"
		  width="1367" height="695">
  		</div>
  		<div id="login-right">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
	    console.log('test',$(this).serialize())
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>
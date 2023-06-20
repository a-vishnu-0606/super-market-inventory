<style>
	.logo {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    height: 45px;
    width: 45px;
    background: white;
    border-radius: 80% 80%;
}
.logo img {
    max-height: 100%;
    max-width: 80%;
}
.text-container {
    display: flex;
    align-items: center;
    padding-left: 10px;
}
</style>

<nav class="navbar navbar-dark bg-dark fixed-top" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left">
  			<div class="logo">
  				<img src="df.png" alt="Logo">
  			</div>
  		</div>
      <div class="col-md-2 float-left text-white mt-2">
        <h4 class="text-white mb-2">SMMS</h4>
      </div>
	  	<div class="col-md-2 float-right text-white mt-2">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
</nav>

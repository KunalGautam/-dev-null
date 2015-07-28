<?php


if (isset($_POST['email']) && isset($_POST['password'])){
	include '../classes/loader.php';
	$email = $_POST['email'];
	$password = $_POST['password'];	
	$login->adminLogin($email, $password);
	//echo $email.$password;
	
	
	
}
else {
	


include 'header-nologin.php';


?>
<div class="container">

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 alert alert-info">
			<form method="POST">
				<div class="form-group">
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
				</div>
				<button type="submit" class="btn btn-primary pull-right">
					Log In
				</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>

</div>
<?php
include 'footer.php';
}
?>
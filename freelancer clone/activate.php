<?php
include 'header.php';
?>

<div class="container">

	<div class="row">
		<div class="row alert alert-info">
				<?php		
					$key = $_GET['key'];
					$activate -> activate($key);
				?>
		</div>
		<div class="col-md-8">
			<b>Project Category</b>
		</div>
		<div class="col-md-8">
			
		</div>
		<div class="col-md-8">
			<?php
			foreach($displaycat->display() as $key){
			echo "<div class=\"col-md-3\"><a href=\"cat.php?catid=".$key['id']."\">".$key['value']."</a></div>";
		}
			
			?>
		</div>

		<div class="col-md-4">
			<?php 
			if(!isset($_SESSION['username'])){//Login Check Starts Here
				
			?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Log In</a></h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<form action="login.php" method="POST">
								<div class="form-group">
									<input type="text" class="form-control" id="username" name="email" placeholder="Enter email or Username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
								</div>
								<div class="form-group">
									Login As:
									<select name="type">

										<option value="1">Freelancer</option>
										<option value="2">Employer</option>

									</select>
								</div>
								<a href="forgot.php">Forgot Password</a>
								<button type="submit" class="btn btn-primary pull-right">
									Log In
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Register </a></h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<form action="register.php" method="POST">
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email ">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
								</div>

								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
								</div>
								<div class="form-group">
									Register As:
									<select name="type">

										<option value="1">Freelancer</option>
										<option value="2">Employer</option>

									</select>
								</div>
								<button type="submit" class="btn btn-success pull-right">
									Register
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
			}//Login Check Ends Here
else {
	include 'logged-in.php';
}
			?>
			
			
		</div>

	</div>

</div><!-- /.container -->

<?php
include 'footer.php';
?>

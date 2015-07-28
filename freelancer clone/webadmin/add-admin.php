<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<form action="add-admin-user.php" method="POST">
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Email" name="email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="password">
			</div>
			<button class="btn btn-primary pull-right" type="submit">Create Admin User</button>
			
		</form>
		</div>
	

<?php
include 'sidebar.php';
?>
</div>
</div>
<?php
include 'footer.php';
?>
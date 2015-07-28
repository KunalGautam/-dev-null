<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php 
		if ($_POST['email'] == "" || $_POST['password'] ==""){
			echo "Email or Password can not be empty";
		}else {
			$RegisterUser ->addAdminUser($_POST['email'], $_POST['password']); 
		
		}
			?>	

		</div>
	

<?php
include 'sidebar.php';
?>
</div>
</div>
<?php
include 'footer.php';
?>
<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php
		if($_GET['email']==$_SESSION['admin']){
			echo "You can not delete yourself.";
		}
		else {
			$v = $dblink->prepare("DELETE FROM admin_user WHERE email = ?");
			$v->bind_param("s", $_GET['email']);
			$result = $v->execute();
			if($result==TRUE){
				echo "User Deleted";
			}
			
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
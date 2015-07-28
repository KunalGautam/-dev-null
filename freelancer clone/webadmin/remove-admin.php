<?php
include 'header.php';
$query = "SELECT * FROM admin_user";
$data = $dblink->query($query);
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php
		
		
		foreach ($data as $row){
			if ($row['email']==$_SESSION['admin']){
				
			}
			else {
				
			
			
			
			
			
		?>
		<div class="alert alert-danger row">
			<?php echo $row['email'];	?>
		
		<a href="delete-user.php?email=<?php echo $row['email']; ?>" class="btn btn-danger pull-right">Delete Admin User</a>
		</div>
		
		<?php
			}//same user else
		}//foreach end
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
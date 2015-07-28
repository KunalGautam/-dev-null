<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php 
		//Delete project
		$v = $dblink->prepare("DELETE FROM project WHERE id = ?");
		$v->bind_param("i", $_GET['id']);
		$v->execute();
		//Delete bit for that project
	
		?>
		Project Deleted.
		</div>
	

<?php
include 'sidebar.php';
?>
</div>
</div>
<?php
include 'footer.php';
?>
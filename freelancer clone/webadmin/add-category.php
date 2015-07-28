<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<div class="col-md-4"><h4>Add Category</h4></div>
		<div class="col-md-8 alert alert-info row">
		<form action="save-category.php" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Category Name" name="category">
			</div>
			<button class="btn btn-primary pull-right" type="submit">Create Category</button>
		</form>
		</div>
		</div>
	

<?php
include 'sidebar.php';
?>
</div>
</div>
<?php
include 'footer.php';
?>
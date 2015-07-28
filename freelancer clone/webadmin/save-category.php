<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php 
		
		if($_POST['category']==""){
			echo "Category name can not be left blank.";
		}
		else {
			$val = $dblink->prepare("INSERT INTO category(value) VALUES (?)");
			$val->bind_param("s", $_POST['category']);
			$value = $val->execute();
			
			if($value==TRUE){
				echo "Category saved";
			}
			else {
				echo "Unable to save category. Seems like category already exsists.";
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
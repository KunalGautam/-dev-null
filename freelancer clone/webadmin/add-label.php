<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
			<div class="row alert alert-info">
				<form method="POST">
					<input type="text" placeholder="config name" name="config-value" />
					<input type="text" placeholder="value" name="value" />
					<button class="btn btn-warning" type="submit">Save</button>
				</form>
			</div>
			<?php 
			if(isset($_POST['config-value']) && isset($_POST['value'])){
				
			
			?>
			
			<div class="row alert alert-success">
				<?php 
				$config = $_POST['config-value'];
				$value = $_POST['value'];
				$var = $dblink->prepare("INSERT INTO website_config(config,value) VALUES (?, ?)");
				$var->bind_param("ss", $config, $value);
				$result = $var->execute();
				if($result){
					echo "Value Saved";
				}
				else {
					echo "config already exsists in database.";
				}
				?>
			</div>
			<?php } ?>
		</div>
	
		

<?php
include 'sidebar.php';
?>
</div>
</div>
<?php
include 'footer.php';
?>
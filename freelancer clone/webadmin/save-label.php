<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php
		$value = $_POST['label'];
		$id = $_GET['id'];
		$val = $dblink->prepare("UPDATE website_config SET value = ? WHERE id = ?");
		$val->bind_param("si", $value, $id);
		$data = $val->execute();
		if($data){
			echo "Values saved in database";
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
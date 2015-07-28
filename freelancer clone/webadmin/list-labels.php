<?php
include 'header.php';

$query = "SELECT * FROM website_config";
$data = $dblink->query($query);

?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
<?php
$i=1;
foreach ($data as $row){
			?>
			<a href="edit-label.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><?php echo $row['config']; ?></a>
			&nbsp;
			
			<?php
			if($i%4==0){
				?>
				
				<div class="row">&nbsp</div>
				<?php
			}
			$i++;
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
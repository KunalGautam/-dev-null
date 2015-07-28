<?php
include 'header.php';
$username = $_SESSION['username'];
$type =  $_SESSION['type'];
/* type 1 is freelancer type 2 is employer */
?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
	<?php 
	if($type=="1"){
		include 'freelancer-dashboard.php';
	}
	
	if($type=="2"){
		include 'employer-dashboard.php';
	}
	?>
		</div>
		<?php include 'sidebar.php'; ?>
	</div>
</div>
<?php
include 'footer.php';
?>
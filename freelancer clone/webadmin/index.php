<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
		<?php
			$query = "SELECT * FROM project WHERE status='0'";
			$result = $dblink->query($query);
			$num = $result->num_rows;
		echo "<b>Number of Active Projects:</b>".$num;
		echo "<br>";
		
		$query = "SELECT * FROM project  WHERE status='1'";
			$result = $dblink->query($query);
			$num = $result->num_rows;
		echo "<b>Number of Closed Projects:</b>".$num;
		echo "<br>";
		
		$query = "SELECT * FROM project_bid";
			$result = $dblink->query($query);
			$num = $result->num_rows;
		echo "<b>Number of Bids Done:</b>".$num;
		echo "<br>";
		
		$query = "SELECT * FROM user WHERE active='1'";
			$result = $dblink->query($query);
			$num = $result->num_rows;
		echo "<b>Number of Active User:</b>".$num;
		echo "<br>";
		
		$query = "SELECT * FROM user  WHERE active='0'";
			$result = $dblink->query($query);
			$num = $result->num_rows;
		echo "<b>Number of Inactive User:</b>".$num;
		echo "<br>";
		
		
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
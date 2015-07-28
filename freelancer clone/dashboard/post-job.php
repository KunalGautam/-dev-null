<?php
include 'header.php';
?>
<div class="container">

	<div class="row">

		<?php
	$title = $_POST['title'];
	$description = $_POST['description'];
	$budget = $_POST['budget'];
	$category = $_POST['category'];
	$timeframe = $_POST['timeframe'];
	$time = date('Y-m-d G:i:s');
	$type = $_SESSION['type'];
	$emailid = $_SESSION['username'];
	$userinfo = $profile -> search($emailid);
	foreach ($userinfo as $key1) {
		$userid = $key1['id'];
	}

	$job_post -> saveJob($title, $description, $budget, $timeframe, $category, $time, $userid, $type);
	echo "Job Posted";
?>
	</div>

</div>

<?php
include 'footer.php';
?>
<?php
include 'header.php';
$username = $_SESSION['username'];
$type =  $_SESSION['type'];
/* type 1 is freelancer type 2 is employer */
?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
		<p>Project Marked as Completed.</p>

		</div>
		<?php include 'sidebar.php'; ?>
	</div>
</div>
<?php

if(isset($_GET['id'])){
	$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
	$userid = $display_user_info->getUserId($userid['id']);
	$job_post->completeJob($_GET['id'], $userid);
}

include 'footer.php';
?>
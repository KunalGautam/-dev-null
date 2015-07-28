
		<div class="row">
			<h4>List of Active Projects</h4>
<?php
$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
$userid = $display_user_info->getUserId($userid['id']);
$list = $project_view->projectDetailofUser($userid,0, 5);
if(sizeof($list)=="0"){
	echo "No Active Project";
}

foreach($list as $array){
	?>
	
	
	<div class="row alert alert-success">
		<h4><?php echo $array['title']; ?></h4>
		<p><?php echo $array['description']; ?></p>
		<a href="complete.php?id=<?php echo $array['id']; ?>" class="btn btn-primary pull-right">Mark as complete</a>
		
	</div>
	
	<?php
		}

?>	
</div>






<div class="row">
			<h4>List of Projects Finished</h4>
<?php
$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
$userid = $display_user_info->getUserId($userid['id']);
$list = $project_view->completedProjectDetailofUser($userid, 0, 5);
if(sizeof($list)=="0"){
	echo "None of the Project Ended";
}
foreach($list as $array){
	?>
	
	
	<div class="row alert alert-success">
		<h4><?php echo $array['title']; ?></h4>
		<p><?php echo $array['description']; ?></p>
		
		
	</div>
	
	<?php
		}

?>	
</div>

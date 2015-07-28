
		
			<h4>List of Projects bided</h4>
<?php
$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
$userid = $display_user_info->getUserId($userid['id']);

$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

$total_records = $bid->listBidsforUserFull($userid);
$total_pages = ceil($total_records / $num_rec_per_page);

$list = $bid->listBidsforUser($userid, $start_from, $num_rec_per_page);
foreach($list as $array){
	?>
	
	
	<div class="row alert alert-success">
		<div class="col-md-10">
		<?php
		$projectid = $array['projectid'];
		$list2 = $project_view -> projectDetail($projectid);
		?>
		<h4><?php echo $list2['title']; ?></h4>
		<p><?php echo $list2['description']; ?></p>
		</div>
		<div class="col-md-2">
			<a href="../project.php?id=<?php echo $list2['id']; ?>" class="btn btn-primary">View Project</a>
		</div>
		

	</div>
	
	
	
	<?php

	}

if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='?page=$prevpage' class=\"btn btn-primary pull-left\">".'Previous Page'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='?page=$nextpage' class=\"btn btn-primary pull-right\">".'Next Page'."</a> "; // Goto last page 
}
?>
	




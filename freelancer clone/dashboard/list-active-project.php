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
$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
$userid = $display_user_info->getUserId($userid['id']);

$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page;
$result = $project_view->projectDetailofUserFull($userid);
$total_records = $project_view->projectDetailofUserFull($userid);
$total_pages = ceil($total_records / $num_rec_per_page); 

$list = $project_view->projectDetailofUser($userid,$start_from, $num_rec_per_page);
if(sizeof($list)=="0"){
	echo "No Active Project";
}

foreach($list as $array){
	?>
	
	
	<div class="row alert alert-success">
		<h4><?php echo $array['title']; ?></h4>
		<p><?php echo $array['description']; ?></p>
		<a href="../project.php?id=<?php echo $array['id']; ?>" class="btn btn-primary pull-light">View Project</a>
		<a href="complete.php?id=<?php echo $array['id']; ?>" class="btn btn-danger pull-right">Mark as complete</a>
		
	</div>
	
	<?php
		}

?>	


		</div>
		<?php include 'sidebar.php'; ?>
	</div>
	
	<div class="col-md-8">
		
	<?php	
		if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='list-active-project.php?page=$prevpage' class=\"btn btn-primary pull-left\">".'Previous Page'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='list-active-project.php?page=$nextpage'  class=\"btn btn-primary pull-right\">".'Next Page'."</a> "; // Goto last page 
}
		
		?>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-12">&nbsp;</div>
</div>
<?php
include 'footer.php';
?>
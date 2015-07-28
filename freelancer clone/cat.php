<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
	<div class="col-md-8">
		<h4>Project Posted Under <b><?php echo $displaycat->catData($_GET['catid'])['value'] ?></b></h4>
		<?php
		
		$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

		
		$data = $displaycat->singleCatData($_GET['catid'], $start_from, $num_rec_per_page);
		$total_records = $displaycat->singleCatDataFull($_GET['catid']);
		$total_pages = ceil($total_records / $num_rec_per_page);
		
		if(!$data){
			?>
			<div class="row alert alert-warning">
				<h5>No Project posted</h5>
			</div>
			
			<?php
		}
		
		foreach($data as $row){
			
			?>
			
			<div class="row alert alert-info">
				<div class="col-md-10">
					<b><?php echo $row['title']; ?></b> (Time Frame: <?php echo $row['timeframe']; ?>)<br><br>
					<b>Project Description:</b><br>
					<?php echo $row['description']; ?><br>
				</div>
				<div class="col-md-2 text-center">
					<a href="project.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Project</a></div><br><br>
					<p class="text-center">Budget: <?php echo $row['budget']; ?></p>
					<p class="text-center">Project Status: <?php 
					 if($row['status']==1){
					 	echo "Completed";
					 }
					 else {
					 	echo "Available";
					 }
						
						?></p>
				
				
			</div>
			
			
			<?php
			
		}
		?>
		
	</div>

<?php
include 'sidebar.php';
?>
</div>
<div class="col-md-8">
<?php
if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='cat.php?catid=$_GET[catid]&page=$prevpage' class=\"btn btn-primary pull-left\">".'Previous Page'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='cat.php?catid=$_GET[catid]&page=$nextpage' class=\"btn btn-primary pull-right\">".'Next Page'."</a> "; // Goto last page 
}
?>
</div>
<div class="col-md-4"></div>
<div class="col-md-12">&nbsp;</div>
</div><!-- /.container -->

<?php
include 'footer.php';
?>
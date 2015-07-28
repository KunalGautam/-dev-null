<?php
include 'header.php';
$value = $project_view -> projectDetail($_GET['id']);
?>
<div class="container">
	<div class="col-md-8">
	<div class="row alert alert-info">
		<h3><?php echo $value['title']; ?> (Time Frame : <?php echo $value['timeframe']; ?>)</h3>
		<h4>Project Description:</h4>
		<p><?php echo $value['description']; ?></p>
		<p><b>Budget: </b><?php echo $value['budget']; ?></p>
		<p><b>Posted By: <?php echo $display_user_info -> getUserName($value['userid']); ?></b> </p>
		<?php
		if ($value['status']=='0'){//Allow bidding only if the bid is active
		if(!isset($_SESSION['type'])){
			
			
		}
		else {
		if($_SESSION['type']=="1"){//Allow bidding only to freelancer
		?>
		<a href="bid.php?id=<?php echo $value['id'] ?>" class="btn btn-warning pull-right"">Bid Now</a>
		
		<?php
		}//End Allow Bidding to freelancer
		}//End Else for not having session
		}//End Allow bidding only active project
		?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
	
	<?php 
	
	$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

		$total_records = $bid->listBidsFull($_GET['id']);
		$total_pages = ceil($total_records / $num_rec_per_page);

	$list = $bid->listBids($_GET['id'], $start_from, $num_rec_per_page);
	
	
	foreach($list as $line){
		?>
		<div class="alert alert-success row">
			<div class="col-md-10">
				<p>Bid By: <?php

				echo $display_user_info -> getUserName($line['userid']);
			 ?></p>
			
			<p><?php echo $line['message']; ?></p>
			</div>
			
			<?php
		$project_poster_id = $value['userid'];
		
		$get_current_user_id = $_SESSION['username'];
		$get_current_user_id = $display_user_info->getUserDetailFromSession($get_current_user_id);
		$get_current_user_id = $get_current_user_id['id'];
		
		if($project_poster_id==$get_current_user_id){
			?>
		
			<div class="col-md-2">
				<a href="dashboard/compose.php?id=<?php echo $line['userid']; ?>" class="btn btn-primary">Contact Bidder</a><br>
				Bid Amount: <?php echo $line['amount']; ?><br>
				Time Frame : <?php echo $line['timeframe']; ?>
			</div>
			<?php
			}
			?>
		</div>
		
		
		<?php
		}
?>

<?php
		
if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='project.php?id=$_GET[id]&page=$prevpage' class=\"btn btn-primary pull-left\">".'Previous Page'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='project.php?id=$_GET[id]&page=$nextpage' class=\"btn btn-primary pull-right\">".'Next Page'."</a> "; // Goto last page 
}
?>


</div>

<?php
include 'sidebar.php';
?>
<div class="col-md-4"></div>
<div class="col-md-12">&nbsp;</div>
</div><!-- /.container -->


<?php
include 'footer.php';
?>
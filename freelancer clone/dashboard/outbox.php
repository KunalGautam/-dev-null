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
$result = $message_class->listOutboxMessageFull($userid);
 
$total_records = $result;
$total_pages = ceil($total_records / $num_rec_per_page); 

			$list = $message_class->listOutboxMessage($userid, $start_from, $num_rec_per_page);
			if (sizeof($list)=="0"){
				echo "No Message";
			}
			else {
				
				foreach($list as $row){
			?>
			<div class="row alert alert-info">
				<a href="view-message.php?id=<?php echo $row['id']; ?>"><?php echo $row['subject']; ?></a> | To: <?php 
				$username = $display_user_info->getUserName($row['msg_to']);
				echo $username; ?>
			</div>
		<?php
				
				}//Foreach End
			}//Else End
		?>
		
		</div>
		<?php include 'sidebar.php'; ?>
	</div>
	<div class="col-md-8">
		<?php
		if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='outbox.php?page=$prevpage' class=\"btn btn-primary pull-left\">".'Previous Page'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='outbox.php?page=$nextpage' class=\"btn btn-primary pull-right\">".'Next Page'."</a> "; // Goto last page 
}
?>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-12">&nbsp;</div>
	
	
</div>
<?php
include 'footer.php';
?>
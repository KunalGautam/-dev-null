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
			$messageid = $_GET['id'];
			$list = $message_class->readMessage($userid, $messageid);
			$message_class->markRead($userid, $messageid);
			if (sizeof($list)=="0"){
				echo "You are not authorized to view this message";
			}
			else {
				
			
			?>
			<div class="row alert alert-info">
				<h4><?php echo $list['subject']; ?></h4>
				<p><?php echo $list['message']; ?></p>
				<?php
					if($userid==$list['msg_to']){
						?>
						<a href="compose.php?id=<?php  echo $list['msg_from']; ?>" class="btn btn-success pull-right">Reply</a>
						
						<?php
						
					}
					else {
						
						?>
						<a href="compose.php?id=<?php  echo $list['msg_to']; ?>" class="btn btn-success pull-right">Reply</a>
						
						<?php
					}
				
				?>
			</div>
		<?php
				
				
			}//Else End
		?>
		
		</div>
		<?php include 'sidebar.php'; ?>
	</div>
</div>
<?php
include 'footer.php';
?>
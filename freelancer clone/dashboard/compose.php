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
			if (!isset($_POST['subject']) || !isset($_POST['message'])){
				
				?>
					<h4>Compose New Message</h4>
		<form method="POST">
	<div class="form-group">
		<label for="c1"><?php echo $websiteConfig->getConfigValue('compose_subject') ?></label>
		<input id="c1" type="text" class="form-control" placeholder="<?php echo $websiteConfig->getConfigValue('compose_subject') ?>" name="subject">
	</div>
	<div class="form-group">
		<label for="c2"><?php echo $websiteConfig->getConfigValue('compose_message') ?></label>
		<textarea id="c2" class="form-control" rows="5" name="message" placeholder="<?php echo $websiteConfig->getConfigValue('compose_message') ?>"></textarea>
	</div>
	
	<button type="submit" class="btn btn-primary pull-right"><?php echo $websiteConfig->getConfigValue('compose_button') ?></button>
	
	<?php
				
				
			}
			else {
				$to = $_GET['id'];
				$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
				$userid = $display_user_info->getUserId($userid['id']);
				$from = $userid;
				$subject = $_POST['subject'];
				$message = $_POST['message'];
				$time = date('Y-m-d G:i:s');
				
				$message_class->messageSend($to, $from, $subject, $message, $time);
				?>
				
				
				
				<?php
			}
			
			?>
	
	
</form>
		</div>
		<?php include 'sidebar.php'; ?>
	</div>
</div>
<?php
include 'footer.php';
?>
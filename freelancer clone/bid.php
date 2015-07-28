<?php
include 'header.php';
//Security to disallow not logged in user
if(!isset($_SESSION['type'])){
	die('You need to be logged in to bid.');
}
//Security to disallow bidding to other user
if($_SESSION['type']!='1'){
	die('Only Freelancer can Bid');	
}


$value = $project_view->projectDetail($_GET['id']);

?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3><?php echo $value['title']; ?></h3>
			
			<?php if(!isset($_POST['bid_amount'])){ //Checking post data 
			if($value['status']=='0'){ //Allow bidding only if project is active
				
			
				
				?>
			<form method="POST">
				<div class="form-group">
					<label for="b1"><?php echo $websiteConfig->getConfigValue('bid_amount') ?></label>
					<input id="b1" type="text" class="form-control"  placeholder="<?php echo $websiteConfig->getConfigValue('bid_amount') ?>" name="bid_amount">
				</div>
				<div class="form-group">
					<label for="b2"><?php echo $websiteConfig->getConfigValue('bid_timeframe') ?></label>
					<input  id="b2" type="text" class="form-control"  placeholder="<?php echo $websiteConfig->getConfigValue('bid_timeframe') ?>" name="timeframe">
				</div>
				<div class="form-group">
					<label for="b3"><?php echo $websiteConfig->getConfigValue('bid_message') ?></label>
					<textarea id="b3"  class="form-control" rows="3" placeholder="<?php echo $websiteConfig->getConfigValue('bid_message') ?>" name="message"></textarea>
				</div>
				<button type="submit" class="btn btn-success pull-right"><?php echo $websiteConfig->getConfigValue('bid_button') ?></button>
			</form>
			<?php 	} //End active project bid if condition
			else { // StartEnd active project bid else condition
				?>
				<div class="col-md-4">Bidding is closed.</div>
				<?php
			}//End active project bid else condition

			
			

			
			
			
			
			
			} //End checking post data 
else {
	$projectid = $_GET['id'];
			$amount = $_POST['bid_amount'];
			$message = $_POST['message'];
			$timeframe = $_POST['timeframe'];
			$time = date('Y-m-d G:i:s');
			$emailid = $_SESSION['username'];
			
			$userinfo = $profile-> search($emailid);
			foreach ($userinfo as $key1) {
					$userid = $key1['id'];
			}
			
			$bid->saveBid($projectid, $amount, $message, $timeframe, $time, $userid);
}
			?>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<?php
include 'footer.php';
?>
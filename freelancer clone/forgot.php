<?php
include 'header.php';
?>
<div class="col-md-4"></div>
<div class="col-md-4">
	<form method="POST" action="reset.php">
		<div class="form-group">
			<label for="username"><?php echo $websiteConfig->getConfigValue('forgot_pass') ?></label>
			<input id="username" type="text" class="form-control" name="username" placeholder="<?php echo $websiteConfig->getConfigValue('forgot_pass') ?>"/>
		</div>
		<button type="submit" class="btn btn-info"><?php echo $websiteConfig->getConfigValue('forgot_pass_button') ?></button>
		
	</form>
	
</div>
<div class="col-md-4"></div>
<?php
include 'footer.php';
?>
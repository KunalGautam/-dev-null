<?php
include 'header.php';
$username = $_SESSION['username'];
$type = $_SESSION['type'];
/* type 1 is freelancer type 2 is employer */
?>
<div class="col-md-4"></div>
<div class="col-md-4">
	<form method="POST">
		<div class="form-group">
			<label for="p1"><?php echo $websiteConfig->getConfigValue('change_pass_old') ?></label>
		<input id="p1" type="password" class="form-control" name="old_password" placeholder="<?php echo $websiteConfig->getConfigValue('change_pass_old') ?>" />
		</div>
		<div class="form-group">
			<label for="p2"><?php echo $websiteConfig->getConfigValue('change_pass_new') ?></label>
		<input id="p2" type="password" class="form-control" name="new_password1" placeholder="<?php echo $websiteConfig->getConfigValue('change_pass_old') ?>" />
		</div>
		<div class="form-group">
			<label for="p3"><?php echo $websiteConfig->getConfigValue('change_pass_new_confirm') ?></label>
		<input  id="p3" type="password" class="form-control" name="new_password2" placeholder="<?php echo $websiteConfig->getConfigValue('change_pass_old') ?>" />
		</div>
		<?php

		// If post data is found.
		if (isset($_POST['old_password'])) {
			// Check if new password matches
			if ($_POST['new_password1'] == $_POST['new_password2']) {
				$oldpass = $_POST['old_password'];
				$newpass = $_POST['new_password1'];
				$newpass = $hash -> passwordHash($newpass);

				$oldpass = $hash -> passwordHash($oldpass);

				$profile -> checkPassword($username, $oldpass, $newpass);

			} else {
				echo "<div class=\"alert alert-danger\"> New Password didn't matched</div>";
			}

		}
	?>
		<button type="submit" class="btn btn-primary pull-right"><?php echo $websiteConfig->getConfigValue('change_pass_button') ?></button>
		
	</form>
	
	
</div>
<div class="col-md-4"></div>









<?php
include 'footer.php';
?>
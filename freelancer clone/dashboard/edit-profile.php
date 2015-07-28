<?php
include 'header.php';
$username = $_SESSION['username'];
$type = $_SESSION['type'];
/* type 1 is freelancer type 2 is employer */
$value = $profile->search($username);
foreach ($value as $key ) {//for each loop start
	


?>
<div class="col-md-4"></div>

<div class="col-md-4">
	<form method="POST" action="save-profile.php">

		<div class="form-group">
			<label for="fullname"><?php echo $websiteConfig->getConfigValue('profile_fullname') ?></label>
			<input id="fullname" type="text" class="form-control" name="fullname" placeholder="<?php echo $websiteConfig->getConfigValue('profile_fullname') ?>" <?php echo "value=\"".$key['full_name']."\""; ?> >
		</div>
		<div class="form-group">
			<label for="address"><?php echo $websiteConfig->getConfigValue('profile_address') ?></label>
			<textarea id="address" class="form-control" rows="5" name="address" placeholder="<?php echo $websiteConfig->getConfigValue('profile_address') ?>" ><?php echo $key['address']; ?></textarea>
		</div>
		<div class="form-group">
			<label for="city"><?php echo $websiteConfig->getConfigValue('profile_city') ?></label>
			<input type="text" class="form-control" name="city" placeholder="<?php echo $websiteConfig->getConfigValue('profile_city') ?>" <?php echo "value=\"".$key['city']."\""; ?>>
		</div>
		<div class="form-group">
			<label for="zip"><?php echo $websiteConfig->getConfigValue('profile_zip') ?></label>
			<input type="text" class="form-control" name="pincode" placeholder="<?php echo $websiteConfig->getConfigValue('profile_zip') ?>" <?php echo "value=\"".$key['pincode']."\""; ?>>
		</div>
		<div class="form-group">
			<label for="country"><?php echo $websiteConfig->getConfigValue('profile_country') ?></label>
			<input type="text" class="form-control" name="country" placeholder="<?php echo $websiteConfig->getConfigValue('profile_country') ?>" <?php echo "value=\"".$key['country']."\""; ?>>
		</div>
<div class="form-group">
		<?php
if ($type=='1'){ // If user is freelancer show skill option
		?>

		<label><?php echo $websiteConfig->getConfigValue('profile_skill') ?></label><br>
			
<?php
// check box listing
		$query = "SELECT * FROM category";
		$result = $dblink->query($query);
		

$skillschecked = unserialize($key['skills']) ;

	
if($skillschecked==""){
				foreach ($result as $key1) {
				echo "<div class=\"col-md-3\"><input type=\"checkbox\"   name=\"skills[]\" value =\"".$key1['value']."\"> ".$key1['value']."</div>";
				}
	}	else {
	foreach ($result as $key1) {
	if(in_array($key1['value'], $skillschecked)){
		echo "<div class=\"col-md-3\"><input type=\"checkbox\" checked  name=\"skills[]\" value =\"".$key1['value']."\"> ".$key1['value']."</div>";
	}
	else {
		echo "<div class=\"col-md-3\"><input type=\"checkbox\"   name=\"skills[]\" value =\"".$key1['value']."\"> ".$key1['value']."</div>";
	}
}
}

/*

	
	
	

*/

?>

<br>

		</div><br>
		<?php 	} ?>

		<a href="change-password.php" class="btn btn-danger"><?php echo $websiteConfig->getConfigValue('profile_change_pass_button') ?></a>
		<button type="submit" class="btn btn-primary pull-right">
			<?php echo $websiteConfig->getConfigValue('profile_save_profile_button') ?>
		</button>

	</form>

</div>

<div class="col-md-4"></div>
<?php
}// For each loop end
include 'footer.php';
?>
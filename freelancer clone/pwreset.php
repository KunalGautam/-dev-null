<?php
include 'header.php';
$id = $_GET['id'];
$hash = $_GET['key'];

if(!isset($_POST['password1'])){
	$value = $resetpass->resetCheck($id, $hash);
	

if ($value==1){

?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<form method="POST">
	
		<div class="form-group">
			<label for="password"><?php echo $websiteConfig->getConfigValue('pass_reset_enter') ?></label>
			<input id="password" type="password" class="form-control" name="password1" placeholder="<?php echo $websiteConfig->getConfigValue('pass_reset_enter') ?>" />
		</div>
		<div class="form-group">
			<label for="password1"><?php echo $websiteConfig->getConfigValue('pass_reset_confirm') ?></label>
			<input id="password1" type="password" class="form-control" name="password2" placeholder="<?php echo $websiteConfig->getConfigValue('pass_reset_confirm') ?>" />
		</div>
		<button type="submit" class="btn btn-success pull-right">
			<?php echo $websiteConfig->getConfigValue('pass_reset_button') ?>
		</button>
	
</form>

<?php
}// If value is 1 loop

else { ?>
	<div class="container">
	<div class="row">
		<div class="col-md-8">
	<?php
	echo "Invalid password reset Key";
}

	

}// If password is not posted
else {
	if($_POST['password1']!=$_POST['password2']){?>
		
		<div class="container">
	<div class="row">
		<div class="col-md-8">	
		<?php
		echo "Password didn't matched";
	}
	else {?>
		
		<div class="container">
	<div class="row">
		<div class="col-md-8">	
		<?php
		$password = $_POST['password1'];
		$resetpass->reset($id, $password, $hash);
	}
}
?>

</div>

<?php
include 'sidebar.php';
?>
</div>


</div>
<?php

include 'footer.php';
?>
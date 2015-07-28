<?php
include 'header.php';
$username = $_SESSION['username'];
$type =  $_SESSION['type'];
/* type 1 is freelancer type 2 is employer */
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$city = $_POST['city'];
$pin = $_POST['pincode'];
$country = $_POST['country'];
if(!isset($_POST['skills'])){
	$skills = NULL;
}
else {
	$skills = serialize($_POST['skills']);
}



?>
<div class="container">
	<div class="col-md-8">
		<?php $profile->saveProfile($username, $type, $fullname, $address, $city, $pin, $country, $skills); ?>
	</div>

<?php
include 'sidebar.php';
?>
</div>
<?php
include 'footer.php';
?>
<?php
include 'header.php';
$emailid = $_POST['username'];
?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<?php

$forgotpass->check($emailid);
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
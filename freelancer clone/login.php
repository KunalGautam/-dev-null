<?php
include 'header.php';

$username = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];
?>
<div class="container">
<?php
$login -> check($username, $password, $type);
?>
</div>
<?php
include 'footer.php';
?>
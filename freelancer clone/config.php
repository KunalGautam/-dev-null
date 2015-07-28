<?php
$url = "http://www.http://mobdevapp.com/kunal";

$password_salt = "hGus*&520@!nv7skj";

$db_name = "freelancer";
$db_user = "freelancer";
$db_password = "freelancer";
$db_host = "localhost";

$dblink = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die("Error while connecting - " . mysqli_error($link)); 

?>
<?php
$host = "localhost";
$db_name = "freelancer";
$db_user = "freelancer";
$db_password = "freelancer";


//conection:
$link = mysqli_connect($host,$db_user,$db_password,$db_name) or die("Error while connecting - " . mysqli_error($link)); 

//consultation:

$query = "SELECT * FROM user" or die("Error while query - " . mysqli_error($link)); 

$result = $link->query($query); 

foreach($result as $row){
echo $row['username']."<br>";
}





?>


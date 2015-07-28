<?php 

$db_name = "dict";
$db_user = "dict";
$db_password = "dict";
$db_host = "localhost";

$dblink = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die("Error while connecting - " . mysqli_error($link)); 

$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

$query = "SELECT * FROM dictionary LIMIT $start_from, $num_rec_per_page";
		
$result = $dblink->query($query);
?>
<table border="1">
<tr><td>Name</td><td>Meaning</td></tr>

<?php 

foreach ($result as $row) {

?> 
            <tr>
            <td><?php echo $row['word']; ?></td>
            <td><?php echo $row['definition']; ?></td>            
            </tr>
<?php 
}; 
?> 
</table>
<?php
$sql = "SELECT * FROM dictionary"; 
$result = $dblink->query($sql);
$total_records = $result->num_rows;
$total_pages = ceil($total_records / $num_rec_per_page); 
if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='pagination.php?page=$prevpage' class=\"btn btn-primary pull-left\">".'|<'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='pagination.php?page=$nextpage' class=\"btn btn-primary pull-right\">".'>|'."</a> "; // Goto last page 
}
?>
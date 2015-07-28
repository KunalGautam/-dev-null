<?php
include 'header.php';

$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

$v = $dblink->prepare("SELECT * FROM project ORDER BY id DESC LIMIT ?,?");
$v->bind_param("ii", $start_from, $num_rec_per_page);
$v->execute();


$data = get_result($v);

$sql = "SELECT * FROM project"; 
$result = $dblink->query($sql);
$total_records = $result->num_rows;
$total_pages = ceil($total_records / $num_rec_per_page); 

?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
<?php

foreach ($data as $row){
			?>
			<div class="alert alert-info row">
				<h4><?php echo $row['title'];  ?></h4>
				<p><?php echo $row['description']; ?></p>
				<a href="del-project.php?id=<?php echo $row['id']; ?>" class="btn btn-danger pull-right">Delete</a>
			</div>
			
			<?php
		}


?>	



		</div>
	

<?php
include 'sidebar.php';
?>
</div>

<div class="col-md-8">
	<?php
	if($page!="1"){
	$prevpage = $page-1;
	echo "<a href='project-list.php?page=$prevpage' class=\"btn btn-primary pull-left\">".'Previous Page'."</a> ";
}



if($page < $total_pages){
$nextpage = $page+1;
echo "<a href='project-list.php?page=$nextpage' class=\"btn btn-primary pull-right\">".'Next Page'."</a> "; // Goto last page 
}
?>
</div>
<div class="col-md-4"></div>
<div class="col-md-12">&nbsp;</div>
</div>
<?php
include 'footer.php';
?>
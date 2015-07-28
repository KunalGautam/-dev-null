<?php
include 'header.php';
?>

<div class="container">

	<div class="row">
		<div class="col-md-8">
			<b>Project Category</b>
		</div>
		<div class="col-md-8">
			
		</div>
		<div class="col-md-8">
			<?php
			$i="1";
			foreach($displaycat->display() as $key){
			echo "<div class=\"col-md-3\"><a href=\"cat.php?catid=".$key['id']."\">".$key['value']."</a></div>";
			if($i%4=="0"){
				?>
				
				<div class="col-md-12">&nbsp;</div>
				<?php
			}	

				$i++;
		}
			
			?>
		</div>

	<?php
	include ('sidebar.php');
	?>

			
		

	</div>

</div><!-- /.container -->

<?php
include 'footer.php';
?>


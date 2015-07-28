<?php
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-8">
			<?php




			$v = $dblink->prepare("SELECT * FROM website_config WHERE id=?");
			$v->bind_param("i", $_GET['id']);
			$v->execute();
			$data = get_result($v);

		
			
			foreach ($data as $row) {
				$title = $row['config'];
				$value = $row['value'];
				$id = $row['id'];
			}

			echo "Edit value for: <b>" . $title . "</b><br>";
			?>
			<form method="POST" action="save-label.php?id=<?php echo $id; ?>">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Label Name" name="label" value="<?php echo $value; ?>">
				</div>
				<button class="btn btn-primary pull-right" type="submit">
					Save Label Value
				</button>
			</form>
		</div>

		<?php
		include 'sidebar.php';
		?>
	</div>
</div>
<?php
include 'footer.php';
?>
<div class="row">
<h4>Post New Project</h4>
<form method="POST" action="post-job.php">
	<div class="form-group">
		<label for="e1"><?php echo $websiteConfig->getConfigValue('emp_post_title') ?></label>
		<input id="e1" type="text" class="form-control" placeholder="<?php echo $websiteConfig->getConfigValue('emp_post_title') ?>" name="title">
	</div>
	<div class="form-group">
		<label for="e2"><?php echo $websiteConfig->getConfigValue('emp_post_desc') ?></label>
		<textarea id="e2"  class="form-control" rows="5" name="description" placeholder="<?php echo $websiteConfig->getConfigValue('emp_post_desc') ?>"></textarea>
	</div>
	<div class="form-group">
		<label for="e3"><?php echo $websiteConfig->getConfigValue('emp_post_budget') ?></label>
		<input id="e3"  type="text" class="form-control" placeholder="<?php echo $websiteConfig->getConfigValue('emp_post_budget') ?>" name="budget">
	</div>
	<div class="form-group">
		<label for="e4"><?php echo $websiteConfig->getConfigValue('emp_post_time') ?></label>
		<input  id="e4" type="text" class="form-control" placeholder="<?php echo $websiteConfig->getConfigValue('emp_post_time') ?>" name="timeframe">
	</div>
	<div class="form-group">
		<label for="e5"><?php echo $websiteConfig->getConfigValue('emp_post_category') ?></label>
		<select  id="e5" name="category">
			<?php
			$query = "SELECT * FROM category";
			$result = $dblink->query($query);
			foreach ($result as $key1) {
				
				echo "<option value=\"".$key1['id']."\">".$key1['value']."</option>";
			}
			
			?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary pull-right"><?php echo $websiteConfig->getConfigValue('emp_post_button') ?></button>
	
</form>
</div>
<?php
include 'list-project.php';
?>
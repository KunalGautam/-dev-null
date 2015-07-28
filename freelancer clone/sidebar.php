	<div class="col-md-4">
					<?php 
			if(!isset($_SESSION['username'])){//Login Check Starts Here
				
			?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Log In</a></h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<form action="login.php" method="POST">
								<div class="form-group">
									<label for="username"><?php echo $websiteConfig->getConfigValue('nologin_login_email') ?></label>
									<input type="text" class="form-control" id="username" name="email" placeholder="<?php echo $websiteConfig->getConfigValue('nologin_login_email') ?>">
								</div>
								<div class="form-group">
									<label for="password"><?php echo $websiteConfig->getConfigValue('nologin_login_password') ?></label>
									<input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $websiteConfig->getConfigValue('nologin_login_password') ?>">
								</div>
								<div class="form-group">
									Login As:
									<select name="type">

										<option value="1">Freelancer</option>
										<option value="2">Employer</option>

									</select>
								</div>
								<a href="forgot.php"><?php echo $websiteConfig->getConfigValue('nologin_login_forgotpass_text') ?></a>
								<button type="submit" class="btn btn-primary pull-right">
									<?php echo $websiteConfig->getConfigValue('nologin_login_button_text') ?>
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Register </a></h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<form action="register.php" method="POST">
								<div class="form-group">
									<label for="email"><?php echo $websiteConfig->getConfigValue('register_email') ?></label>
									<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $websiteConfig->getConfigValue('register_email') ?>">
								</div>
								<div class="form-group">
									<label for="username1"><?php echo $websiteConfig->getConfigValue('register_username') ?></label>
									<input type="text" class="form-control" id="username1" name="username" placeholder="<?php echo $websiteConfig->getConfigValue('register_username') ?>">
								</div>

								<div class="form-group">
									<label for="password1"><?php echo $websiteConfig->getConfigValue('register_password') ?></label>
									<input type="password1" class="form-control" id="password" name="password" placeholder="<?php echo $websiteConfig->getConfigValue('register_password') ?>">
								</div>
								<div class="form-group">
									<label for="s1"><?php echo $websiteConfig->getConfigValue('register_role') ?></label>
									<select name="type" id="s1">

										<option value="1">Freelancer</option>
										<option value="2">Employer</option>

									</select>
								</div>
								<button type="submit" class="btn btn-success pull-right">
									<?php echo $websiteConfig->getConfigValue('register_button_text') ?>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
			}//Login Check Ends Here
else {
	include 'logged-in.php';
}
			?>
			</div>
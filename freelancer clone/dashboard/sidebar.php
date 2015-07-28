<div class="col-md-4">
			<h4><a href="edit-profile.php">Edit Profile</a></h4>
			<h4><a href="change-password.php">Change Password</a></h4>
			<h4><a href="index.php">Show Dashboard</a></h4>
			<h4><a href="inbox.php">Inbox</a> <?php 
				$userid = $display_user_info->getUserDetailFromSession($_SESSION['username']);
				$userid = $display_user_info->getUserId($userid['id']);
				echo $message_class->countUnreadmessage($userid);
				?> Message Unread</h4>
			<h4><a href="outbox.php">Outbox</a></h4>
			<?php if($type=="2"){ ?>
				<h4><a href="list-active-project.php">List all active projects</a></h4>
				<h4><a href="list-closed-project.php">List all closed projects</a></h4>
			<?php } ?>
		</div>
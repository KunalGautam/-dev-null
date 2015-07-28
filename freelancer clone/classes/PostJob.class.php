<?php
class PostJob {
	public function saveJob($title, $description, $budget, $timeframe, $category, $time, $userid, $type) {
		global $dblink;
		if ($type == "2") {// Only Employer can post job

			$v = $dblink->prepare("INSERT INTO project (catid, userid, title, description, budget, timeframe, date, status) 
			VALUES (?, ?, ?, ?, ?, ?, ?, '0')");
			$v->bind_param("sssssss", $category, $userid, $title, $description, $budget, $timeframe, $time);
			

			if ($v->execute()==TRUE){
				global $MailSend;
				$MailSend->notificationOnCategory($category);
			}
						
		

		}
	}
	
	public function completeJob($id, $userid){
		global $dblink;
		$v = $dblink->prepare("UPDATE project SET status='1' WHERE (id=? AND userid=?)");
		$v->bind_param("ii", $id, $userid);
		$v->execute();

		
	}

}
?>
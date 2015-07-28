<?php
//Class for sending email

class MailSend{
	private function send($to, $subject, $message){
		//Using PHP mail() function
		//mail($to, $subject, $message);
		echo $to."\n".$subject."\n".$message;
		
		
	} 
	
	public function RegistrationEmail($to, $hash){
		global $url;
		$subject = "Activate your email";
		$message = "To activate your account click on ".$url."/activate.php?key=".$hash;
		
		$this->send($to, $subject, $message);
	}
	
	public function ForgotEmail($to, $hash) {
		global $url;
		$subject = "Password Reset Link";
		$message = "To reset click on ".$url."/pwreset.php?id=".$to."&key=".$hash;
		
		$this->send($to, $subject, $message);
	}
	
	public function notificationOnCategory($catid){
		global $dblink;
		global $url;

		$v = $dblink->prepare("SELECT * from category WHERE id=?");
		$v->bind_param("i", $catid);
		$v->execute();
		

		
		
		
		$catArray = get_result($v);

		foreach($catArray as $list){
			$value = $list['value'];
		}
		$s = "%$value%";
		$v1 = $dblink->prepare("SELECT * FROM user WHERE skills LIKE ?");
		$v1->bind_param("s", $s);
		$v1->execute();
		$userArray = get_result($v1);
				
		$subject = "New project Posted under ".$value;
		$message = "To view project go to listing at ".$url."/cat.php?catid=".$catid;
		
		foreach ($userArray as $key ) {
			$to = $key['email'];	
			$this->send($to, $subject, $message);
		}
		
		
	}
	
	public function sendEmailonMessage($to,$subject , $message){
		
		global $display_user_info;
		$email = $display_user_info->getUserEmail($to);
		
		$this->send($email, $subject, $message);
	}
	
	
	
	
	
}

?>
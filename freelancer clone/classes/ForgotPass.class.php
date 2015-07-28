<?php
class ForgotPass {
	public function check($emailid) {
		global $dblink;
		global $hash;
		$activationHash = $hash -> activationHash();
		$value = $this -> checkEmailValid($emailid);
		if ($value=='1'){
			$v = $dblink->prepare("UPDATE user SET hash='$activationHash' WHERE (email=? OR username=?) AND active='1'");
			$v->bind_param("ss", $emailid, $emailid);
			$v->execute();

		
		
			$this -> sendEmail($emailid, $activationHash);
		}
		
		
				
	}

	private function checkEmailValid($emailid) {
		global $dblink;

		$v = $dblink->prepare("SELECT * FROM user WHERE (email=? OR username=?) AND active='1'");
		$v->bind_param("ss", $emailid, $emailid);
		$v->execute();

		$v->store_result();


		
		$result = $v->num_rows;
		
		
		if ($result != '1') {
			echo "Email is not active";
		}
		else {
			return '1';
		}
	}

	private function sendEmail($emailid, $hash) {
		global $MailSend;

		$MailSend -> ForgotEmail($emailid, $hash);
	}
	
	

}
?>

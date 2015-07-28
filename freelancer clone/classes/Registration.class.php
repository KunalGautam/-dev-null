<?php
// Registration class
class Registration {

	public function saveRegistration($email, $username, $password, $type) {
		// Check email and username. If it doesn't exsist, save registration info in database
		//check email
		$this -> checkEmail($email);
		//check username
		$this -> checkUserName($username);

		//Creating Activation Hash and Encrypting database
		global $hash;

		$activationHash = $hash -> activationHash();

		$passwordHash = $hash -> passwordHash($password);

		//Save info in database
		global $dblink;

		$v = $dblink->prepare("INSERT INTO user(username, email, password, hash, type) VALUES(?, ?, ?, ?, ?)");
		$v->bind_param("ssssi", $username, $email, $passwordHash, $activationHash, $type);
		
		

		
		
		if($v->execute()==TRUE){
			echo "Account Registered. Please check email for activation code.";
			$this -> sendEmail($email, $activationHash);
			
		}
		

	}

	private function sendEmail($email, $hash) {
		global $MailSend;

		$MailSend -> RegistrationEmail($email, $hash);

	}

	private function checkEmail($email) {
		global $dblink;

		$v = $dblink->prepare("SELECT * FROM user WHERE email =?");
		$v->bind_param("s", $email);
		$v->execute();
		$v->store_result();
		
		
		
		if($v->num_rows != '0'){
			die("Email Already Exsists");
		}

		
	}

	private function checkUserName($username) {
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM user WHERE username =?");
		$v->bind_param("s", $username);
		$v->execute();
		$v->store_result();

		
		if($v->num_rows != '0'){
			die("UserName Not Available");
		}

		
	}
	
	public function addAdminUser($username, $password) {
		global $hash;
		$passwordHash = $hash -> passwordHash($password);
		
		
		global $dblink;
		$val = $dblink->prepare("INSERT INTO admin_user (email, password) VALUES (?, ?)");
		$val->bind_param("ss", $username, $passwordHash);
		$result = $val->execute();
		
		
		if($result==TRUE){
			echo "Admin user added";
		}
		else {
			echo "Please use different email address. The email address $username already exsist in database.";
		}
		
	}

}
?>
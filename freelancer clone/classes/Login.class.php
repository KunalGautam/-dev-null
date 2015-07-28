<?php
// Login/Logout Class for PHP
session_start();
class Login {
	
	public function adminLogin($email, $password){
		global $dblink;
		global $hash;
		$password = $hash->passwordHash($password);
		$v = $dblink->prepare("SELECT * FROM admin_user WHERE email=? AND password='$password'");
		$v->bind_param("s", $email);
		$v->execute();
		$v->store_result();
		
		
		 if ($v->num_rows =='1'){
			// On valid login set session
			$_SESSION['admin'] = $email;
		    header('Location: index.php');
		}
		else {
			echo "Invalid Login";
		}
		 
			
		
		
	}

	public function check($username, $password, $type) {
		
		global $dblink;
		global $hash;
		$password = $hash->passwordHash($password);

		$v = $dblink->prepare("SELECT * FROM user WHERE (username=? OR email=?) 
		AND password=? AND active='1' AND type=?");
		$v->bind_param("sssi", $username, $username, $password, $type);
		$v->execute();
		$v->store_result();
		
		if ($v->num_rows == '1') {
			$this ->SetSession($username, $type);
		}
		else {

			if($this->checkEmailActive($username)=="1"){
				echo "Invalid Login Plese try again.";
			}
			else {
				echo "Email Doesn't seems to be active.";
			}

			
		}
	}
	
	public function checkEmailActive($email){
		global $dblink;


		$v = $dblink->prepare("SELECT * FROM user WHERE (username=? OR email=?) AND active='0'");
		$v->bind_param("ss", $email, $email);
		$v->execute();
		$v->store_result();

		if ($v->num_rows=='1'){
			return "0";
		}
		else {
			return "1";
		}

		
	}
	
	public function SetSession($email, $type) {
		$_SESSION['username'] = $email;
		$_SESSION['type'] = $type;
		header('Location: ./');
	}

}
?>
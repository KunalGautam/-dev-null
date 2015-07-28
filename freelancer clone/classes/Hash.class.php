<?php
//Class for creating Hash for activation and password


class Hash{
	
	public function passwordHash($password){
		global $password_salt;
		$passwordAndSalt = $password.$password_salt;
		$hashPassword = hash('sha256', $passwordAndSalt);
		return $hashPassword;
	}
	
	public function activationHash(){
		// Activation hash is created by converting random number from given value to MD5
		$value = md5(rand(143234, 992323));
		return $value;
	}
	
}

?>
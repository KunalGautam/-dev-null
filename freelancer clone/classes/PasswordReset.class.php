<?php
class PasswordReset{
	public function resetCheck($id, $hash){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM user WHERE (email=? OR username=?) AND (hash=?)");
		$v->bind_param("sss", $id, $id, $hash);
		$v->execute();
		$v->store_result();
		

		$value = $v->num_rows;
		return $value;
	}
	
	public function reset($id, $password, $hash){
		global $dblink;
		
		global $password_salt;
		$passwordAndSalt = $password.$password_salt;
		$hashPassword = hash('sha256', $passwordAndSalt);
		$newhash = hash('sha256', $passwordAndSalt.$id.$password);

		$v = $dblink->prepare("UPDATE user SET password=?, hash=? WHERE 
		(email=? OR username=?) 
			AND 
		(hash=? AND active='1')");
		$v->bind_param("sssss", $hashPassword, $newhash, $id, $id, $hash);
		
		
		
		if($v->execute()==TRUE){
			echo "Password Reset done.";
		}
		
		
		
	}
	
}
?>
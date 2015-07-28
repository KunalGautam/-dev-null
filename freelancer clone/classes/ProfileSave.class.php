<?php
class ProfileSave {
	public function search($emailid) {
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM user WHERE email=? or username=?");
		$v->bind_param("ss", $emailid, $emailid);
		$v->execute();
		
		
		$result = get_result($v);

		
		return $result;

	}

	public function saveProfile($username, $type, $fullname, $address, $city, $pin, $country, $skills) {
		global $dblink;

		$v = $dblink->prepare("UPDATE user SET 
		full_name=?, address=?, city=?, pincode=?, country=?, skills=?
		WHERE
		(username=? or email=?) AND type=?");
		$v->bind_param("sssssssss", $fullname, $address, $city, $pin, $country, $skills, $username, $username, $type);
		
		if($v->execute()==TRUE){
			echo "Profile Saved";
		}
		
		

	}

	public function checkPassword($emailid, $oldpass, $newpass) {
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM user WHERE (username=? or email=?) AND password=?");
		$v->bind_param("sss", $emailid, $emailid, $oldpass);
		$v->execute();
		
		$v->store_result();
		
		if ($v->num_rows=='1'){
			$this -> savePassword($emailid, $newpass);
		}
		else {
			echo "<div class=\"alert alert-danger\"> Old password is wrong</div>";
		}
		
	}

	private function savePassword($emailid, $password) {
		global $dblink;
		$v = $dblink->prepare("UPDATE user SET 
		password=?
		WHERE
		(username=? or email=?)");
		$v->bind_param("sss", $password, $emailid, $emailid);
			
		if($v->execute()==TRUE){
			echo "<div class=\"alert alert-info\"> Password changed sucessfully</div> ";
		}
		

	}

}
?>
<?php
class DisplayUserInfo {
	private function getUserInfo($id) {
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM user WHERE id=?");
		$v->bind_param("i", $id);
		$v->execute();

		
		$result = get_result($v);
		
		
		return $result;

	}

	public function getUserEmail($id) {
		$data = $this -> getUserInfo($id);
		foreach ($data as $key) {
			return $key['email'];
		}
	}

	public function getUserName($id) {
		$data = $this -> getUserInfo($id);
		foreach ($data as $key) {
			return $key['username'];
		}
	}

	public function getUserId($id) {
		$data = $this -> getUserInfo($id);
		foreach ($data as $key) {
			return $key['id'];
		}
	}

	public function getUserDetailFromSession($emailid) {
		global $dblink;
		$query = "SELECT * FROM user WHERE username='$emailid' OR email='$emailid'";
		$result = $dblink->query($query);
		
		
		foreach ($result as $keyvalue){
			return $keyvalue;
		}
	}

}
?>
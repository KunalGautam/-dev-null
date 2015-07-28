<?php
// Activation class

class Activation {
	public function activate($key) {
		$this -> checkActive($key);

	}

	private function checkActive($key) {

		global $dblink;
		
		$v = $dblink->prepare("SELECT * FROM user WHERE hash = ? AND active = '0'");
		$v->bind_param("s", $key);
		$v->execute();
		$v->store_result();
		
		
		if ($v->num_rows == "1") {
			$this -> activationSave($key);
			echo "Activated";
		} else {
			echo "Invalid Activation Key";
			
		}

	}

	private function activationSave($key) {
		global $dblink;
		$hashkey = mt_rand('1', '500');
		$hashkey = hash('sha256', $hashkey.$key.$hashkey);

		$var = $dblink->prepare("UPDATE user SET hash=?, active = '1' WHERE hash =?");
		$var->bind_param("ss", $hashkey, $key);
		$var->execute();
		
		
	}

}
?>
<?php
class WebsiteConfig{
	
	
	public function getConfigValue($value){
		$get_value = $this->DbQuery($value);
		// $value to be defined
		foreach ($get_value as $key) {
			$result = $key['value'];
		}
		return $result;
	}

	
	private function DbQuery($find){
		global $dblink;
		$query = "SELECT * FROM website_config WHERE config = '$find'";
		
		$value = $dblink->query($query);
		
		return $value;
	}
}
?>
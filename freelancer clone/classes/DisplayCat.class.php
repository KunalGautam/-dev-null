<?php
class DisplayCat{
	public function display(){
		global $dblink;

		$query = "SELECT * FROM category ORDER BY id ASC";
		$result = $dblink->query($query);
		return $result;
	}
	
	public function singleCatData($id, $from, $to){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE catid=? ORDER BY date DESC LIMIT ?,?"); 
		$v->bind_param("iii", $id, $from, $to );
		$v->execute();

		
		$result = get_result($v);
		return $result;
	}
	
	public function singleCatDataFull($id){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE catid=?"); 
		$v->bind_param("i", $id );
		$v->execute();
		$v->store_result();
		
		$result = $v->num_rows;
		return $result;
	}
	
	public function catData($id){
		global $dblink;

		$v = $dblink->prepare("SELECT * FROM category WHERE id=?"); 
		$v->bind_param("i", $id);
		$v->execute();

		
		$result = get_result($v);

		
		foreach ($result as $value){
			return $value;	
		}
		
		
	}
	
	
}
?>
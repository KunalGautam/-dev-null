<?php
class ProjectView {
	public function projectDetail($id){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE id=?");
		$v->bind_param("i", $id);
		$v->execute();

		$data =get_result($v);
		foreach ($data as $row){
			return $row;
		}
		
	
	}
	
	public function projectDetailofUser($userid, $from, $to){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE userid=? AND status='0' ORDER BY id DESC LIMIT ?,?");
		$v->bind_param("iii", $userid, $from, $to);
		$v->execute();
		

		
		$data = get_result($v);
		return $data;
	}
	
	public function projectDetailofUserFull($userid){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE userid=? AND status='0'");
		$v->bind_param("i", $userid);
		$v->execute();
		$v->store_result();
		return $v->num_rows;
	}
	
	public function completedProjectDetailofUser($userid, $from, $to){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE userid=? AND status='1' ORDER BY id DESC LIMIT ?,?");
		$v->bind_param("iii", $userid, $from, $to);
		$v->execute();
		

		
		$data = get_result($v);
		return $data;
	}
	
	public function completedProjectDetailofUserFull($userid){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project WHERE userid=? AND status='1'");
		$v->bind_param("i", $userid);
		$v->execute();
		$v->store_result();
		return $v->num_rows;
	}
	
}
?>
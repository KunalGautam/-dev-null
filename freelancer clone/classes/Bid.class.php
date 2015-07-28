<?php
class Bid {
	public function saveBid($projectid, $amount, $message, $timeframe, $time, $userid) {
		global $dblink;
		$v= $dblink->prepare("INSERT INTO project_bid (projectid, userid, message, timeframe, date, amount)
		VALUE
		(?,?,?,?,?,?)");
		$v->bind_param("ssssss", $projectid, $userid, $message, $timeframe, $time, $amount);
		$v->execute();
		echo "Bidding Saved";
	}
	
	public function listBids($projectid, $from, $to){
		global $dblink;
		$v= $dblink->prepare("SELECT * FROM project_bid WHERE projectid=? ORDER BY date ASC LIMIT ?,?");
		$v->bind_param("iii", $projectid, $from, $to);
		$v->execute();
		$result = get_result($v);
		
		return $result;
	}
	public function listBidsFull($projectid){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project_bid WHERE projectid=?");
		$v->bind_param("i", $projectid);
		$v->execute();
		$v->store_result();
		$result=$v->num_rows;
		
		return $result;
	}
	
	public function listBidsforUser($userid, $from, $to){
		global $dblink;
		$v=$dblink->prepare("SELECT * FROM project_bid WHERE userid=? ORDER BY ID DESC LIMIT ?,?");
		$v->bind_param("iii", $userid, $from, $to );
		$v->execute();
		$result =get_result($v);
		return $result;
		
	}
	
	public function listBidsforUserFull($userid){
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM project_bid WHERE userid=?");
		$v->bind_param("i", $userid);
		$v->execute();
		$v->store_result();
		$result=$v->num_rows;
		
		return $result;
		
	}

}
?>
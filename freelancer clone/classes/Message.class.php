<?php
class Message {
	public function readMessage($userid, $messageid){
		// Function to read single message
		global $dblink;

		$v = $dblink->prepare("SELECT * FROM message WHERE (msg_to=? OR msg_from=?) AND id=?");
		$v->bind_param("iii", $userid, $userid, $messageid);
		$v->execute();
			$result = get_result($v);
	
		foreach($result as $row) {
			return $row;
		}
	}
	
	public function markRead($userid, $messageid){
		// Function to mark single message read
		global $dblink;

		$v = $dblink->prepare("UPDATE message SET is_unread='1' WHERE msg_to=? AND id=?");
		$v->bind_param("ii", $userid, $messageid);
		$v->execute();
		
	}
	
	public function listInboxMessage($userid, $from, $to){
		// Function to list Message inbox
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM message WHERE msg_to=? ORDER BY time DESC LIMIT ?,?");
		$v->bind_param("iii", $userid, $from, $to);
		$v->execute();
		
		$data = get_result($v);
		return $data;
	}
	
	public function listInboxMessageFull($userid){
		// Function to list Message inbox
		global $dblink;

		$v = $dblink->prepare("SELECT * FROM message WHERE msg_to=? ORDER BY time DESC");
		$v->bind_param("i", $userid);
		$v->execute();
		$v->store_result();

		$data = $v->num_rows;
		return $data;
	}
	
	public function listOutboxMessage($userid, $from, $to){
		// Function to list Message outbox	
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM message WHERE msg_from=? ORDER BY time DESC LIMIT ?,?");
		$v->bind_param("iii", $userid, $from, $to);
		$v->execute();
		$v->store_result();

		$data = get_result($v);
		return $data;
	}
	public function listOutboxMessageFull($userid){
		// Function to list Message outbox	
		global $dblink;
		$v = $dblink->prepare("SELECT * FROM message WHERE msg_from=? ORDER BY time DESC");
		$v->bind_param("i", $userid);
		$v->execute();
		$v->store_result();

		$data = $v->num_rows;

		
		return $data;
	}
	
	public function messageSend($to, $from, $subject, $message, $time){
		// Function to send message
		global $dblink;

		$v = $dblink->prepare("INSERT into message(msg_from, msg_to, is_unread, subject, message,time) VALUES 
		(?, ?, '0', ?, ?, ? )");
		$v->bind_param("iisss", $from, $to, $subject, $message, $time);
		
		
		if($v->execute()==TRUE){
			global $MailSend;
			$MailSend->sendEmailonMessage($to, $subject, $message);
			echo "Message Sent";
		}
		
		
		//Send Message to email
		
		
	}
	
	public function countUnreadmessage($userid){
		// Function to count unread message	
		global $dblink;

		$v = $dblink->prepare("SELECT * FROM message WHERE (msg_to=? AND is_unread='0')");
		$v->bind_param("i", $userid);
		$v->execute();
		$v->store_result();

		
		
		$value = $v->num_rows;		
		

		return $value;
		
	}
	
	
}
?>
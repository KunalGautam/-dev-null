<?php

$address_check = "mail@example.com";

var_dump(checkEmail($address_check));

function checkEmail($email) {
	// checks proper syntax
	if (preg_match("/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/", $email)) {

		// gets domain name
		list($username, $domain) = explode('@', $email);
		// checks for if MX records in the DNS
		if (!checkdnsrr($domain, 'MX')) {
			return false;
		}
		// attempts a socket connection to mail server
		if (!fsockopen($domain, 25, $errno, $errstr, 30)) {
			return false;
		}
		return smtp_validate($email);

	}
	return false;
}

function smtp_validate($email) {

	$result = false;

	list($name, $domain) = explode('@', $email);

	# SMTP QUERY CHECK

	$max_conn_time = 30;

	$sock = '';

	$port = 25;

	$max_read_time = 5;

	$users = $name;

	# retrieve SMTP Server via MX query on domain

	$hosts = array();

	$mxweights = array();

	getmxrr($domain, $hosts, $mxweights);

	$mxs = array_combine($hosts, $mxweights);

	asort($mxs, SORT_NUMERIC);

	#last fallback is the original domain

	$mxs[$domain] = 100;

	$timeout = $max_conn_time / count($mxs);

	# try each host

	while (list($host) = each($mxs)) {

		#connect to SMTP server

		if ($sock = fsockopen($host, $port, $errno, $errstr, (float) $timeout)) {

			stream_set_timeout($sock, $max_read_time);

			break;

		}

	}

	# did we get a TCP socket

	if ($sock) {

		$reply = fread($sock, 2082);

		preg_match('/^([0-9]{3}) /ims', $reply, $matches);

		$code = isset($matches[1]) ? $matches[1] : '';

		if ($code != '220') {

			# MTA gave an error...

			return $result;

		}

		# initiate smtp conversation

		$msg = "HELO " . $domain;

		fwrite($sock, $msg . "\r\n");

		$reply = fread($sock, 2082);

		# tell of sender

		$msg = "MAIL FROM: <" . $name . '@' . $domain . ">";

		fwrite($sock, $msg . "\r\n");

		$reply = fread($sock, 2082);

		#ask of recepient

		$msg = "RCPT TO: <" . $name . '@' . $domain . ">";

		fwrite($sock, $msg . "\r\n");

		$reply = fread($sock, 2082);

		#get code and msg from response

		preg_match('/^([0-9]{3}) /ims', $reply, $matches);

		$code = isset($matches[1]) ? $matches[1] : '';

		if ($code == '250') {

			#you received 250 so the email address was accepted

			$result = true;

		} elseif ($code == '451' || $code == '452') {

			#you received 451 so the email address was greylisted

			#or some temporary error occured on the MTA) - so assume is ok

			$result = true;

		} else {

			$result = false;

		}

		#quit smtp connection

		$msg = "quit";

		fwrite($sock, $msg . "\r\n");

		# close socket

		fclose($sock);

	}

	return $result;

}
?>

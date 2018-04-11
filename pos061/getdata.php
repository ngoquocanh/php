<?php
	header('Access-Control-Allow-Origin: *');
	if(!empty($_POST['user_id'])) {
		$data = array();

		// database details
		$dbHost = 'localhost';
		$dbUsername = 'root';
		$dbPassword = 'qwe!@#1qa';
		$dbName = 'demo';

		// create connection and select DB
		$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
		if($db->connect_error) {
			die("Unable to connect database: " . $db->connect_error);
		}

		// get user data from the database
		$query = $db->query("SELECT * FROM users WHERE id = {$_POST['user_id']}");
		if($query->num_rows > 0) {
			$userData = $query->fetch_assoc();
			$data['status'] = 'ok';
			$data['result'] = $userData;
		} else {
			$data['status'] = 'err';
			$data['result'] = '';
		}

		// return data as JSON format
		echo json_encode($data);
	}
?>

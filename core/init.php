<?php
	session_start();
	error_reporting(0);

	require 'core/database/connect.php';

	require 'core/functions/users.php';

	require 'core/functions/general.php';

	if (logged_in() === true) {
		$session_user_id = $_SESSION['user_id'];
		$user_data = user_data($session_user_id, 'user_id', 'email', 'username', 'password', 'first_name', 'last_name');
		
		if (user_active($user_data['email']) === false) {
			session_destroy();
			header('Location: index.php');
			exit();
		}

	}
	$errors = array();
?>
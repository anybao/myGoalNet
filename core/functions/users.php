<?php
	function loggin_protect() {
		if (logged_in() === false) {
			header('Location: index.php');
			exit();
		}
	}

	function register_user($register_data) {
		array_walk($register_data, 'array_sanitize');
		$register_data['password'] = md5($register_data['password']);
		
		$fields = '`'.implode('`, `', array_keys($register_data)).'`';
		$data = '\''.implode('\', \'', $register_data).'\'';
		mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	}

	function setup_goal($setup_data) {
		$fields = '`'.implode('`, `', array_keys($setup_data)).'`';
		$data = '\''.implode('\', \'', $setup_data).'\'';
		mysql_query("INSERT INTO `goal` ($fields) VALUES ($data)");
	}

	function user_data($user_id) {
		$data = array();
		$user_id = (int) $user_id;

		$func_num_args = func_num_args();
		$func_get_args = func_get_args();

		if ($func_num_args > 1) {
			unset($func_get_args[0]);
			$fields = '`'.implode('`, `', $func_get_args).'`';
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
			return $data;
		}
	}

	function logged_in() {
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	function user_exists($email) {
		$email = sanitize($email);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM users WHERE `email` = '$email' ");
		return (mysql_result($query, 0) == 1) ? true : false;
	}

	function user_active($email) {
		$email = sanitize($email);
		$query = mysql_query("SELECT COUNT(`user_id`) from users WHERE `email` = '$email' AND `active` = 1 ");
		return (mysql_result($query, 0) == 1) ? true : false;
	}

	function user_id_from_email($email) {
		$email = sanitize($email);
		return mysql_result(mysql_query("SELECT (`user_id`) FROM `users` WHERE `email` = '$email'"), 0,'user_id');
	}

	function login($email, $password) {
		$user_id = user_id_from_email($email);

		$email = sanitize($email);
		$password = md5($password);

		return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `password` = '$password'"), 0)==1) ? $user_id : false;
	}
?>
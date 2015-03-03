<p>This is basic version of MyGoal Net. The full version will be updated soon!</p>
<h2>Register a new account</h2><br>
<div class="check">
<?php
	if (empty($_POST) === false) {
		$required_fields = array('first_name','last_name','username','password','password_again','email');
		foreach ($_POST as $key => $value) {
			if (empty($value) && in_array($key, $required_fields) === true) {
				$errors[] = 'All fields need to be filled in';
				break 1;
			}
		}

		if (empty($errors) === true) {
			if (user_exists($_POST['email']) === true) {
				$errors[] = 'Sorry, the email \''.$_POST['email'].'\' is already taken.';
			}
			if (preg_match("/\\s/", $_POST['username']) == true) {
				$errors[] = 'Your username must not contain any space';
			}
			if (strlen($_POST['password']) < 6) {
				$errors[] = 'Your password must be at least 6 characters';
			}
			if ($_POST['password'] != $_POST['password_again']) {
				$errors[] = 'Your password does not match!';
			}
		}
	}
	if (empty($_POST) === false && empty($errors) === true) {
		$register_data = array(
				'email' 		=> $_POST['email'],
				'username' 		=> $_POST['username'],
				'password' 		=> $_POST['password'],
				'first_name' 	=> $_POST['first_name'],
				'last_name' 	=> $_POST['last_name'],
			);
		register_user($register_data);
		header('Location: confirm.php');
		exit();
	} else if(empty($errors) === false) {
		echo output_errors($errors);
	}
?>

</div>
	<div class="register">
		<form action = "" method = "POST">
			<br>
				<input type = "text" name = "first_name" placeholder = "First name">													
			<br>
				<input type = "text" name = "last_name" placeholder = "Last name">	
			<br>
				<input type = "text" name = "username" placeholder = "Username">													
			<br>
				<input type = "password" name = "password" placeholder = "Password">													
			<br>
				<input type = "password" name = "password_again" placeholder = "Re-enter password">													
			<br>
				<input type = "email" name = "email" placeholder = "Email">
			<br>
				<input type = "submit" value = "Register" class = "registerBtn">
		</form>
</div>
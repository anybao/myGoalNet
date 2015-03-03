<?php
	include 'core/init.php';
	include 'includes/overall/header.php';
?>

<div class = "main">
<?php
	if (empty($_POST) === false) {
		$email = $_POST['email'];
		$password  = $_POST['password'];

		if (empty($email) === true || empty($password) === true) {
			$errors[] = 'You need to enter email and password!';

		} else if (user_exists($email) === false) {
			$errors[] = 'Cant find that email. Have you registered yet?';
		} else if (user_active($email) === false) {
			$errors[] = 'You have to activate your account!';
		} else {

			if (strlen($password) > 1024) {
				$errors[] = 'Password is too long!';
			}

			$login = login($email, $password);
			if ($login === false) {
				$errors[] = 'Email or password is in correct';
			} else {
				$_SESSION['user_id'] = $login;
				header('Location: index.php');
				exit();
			}
		}
		
	}

	if (isset($_SESSION['user_id'])) {
		echo "Logged-in";
	} else {
		echo "Not Logged-in";
	}

	if (empty($errors) === false) {
		echo "<h3></br>We did try to log-in but...</h3>";
		echo output_errors($errors);
	}
?>


<br><br><a href="index.php">Try register now!</a>
</div>

<?php 
	include 'includes/overall/footer.php'; ?>
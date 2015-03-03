<aside>

	<?php
		if (logged_in() === true) {
		?>
	<img class = "logo" src="img/user.png" width = "100" height = "100">
	<p class = "hello">
		<?php echo $user_data['first_name']; echo " ";
			echo $user_data['last_name'];
			?></p>
	
	<?php
			include 'includes/widgets/loggedin.php';
			?>
	
	<?php
		} else {
	?>
	<img class = "logo" src="img/logo.png" width = "100" height = "100">
	
	<?php 
			include 'includes/widgets/login.php';
		}
	?>
</aside>
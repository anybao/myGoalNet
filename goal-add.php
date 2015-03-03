<!DOCTYPE html>
<html>
	<?php 
		include 'core/init.php';
		include 'core/database/connect.php';
		include 'includes/head.php';
		include 'includes/overall/header.php';
		loggin_protect();
	?>
	<body>
		<div class="navigation">
 					<a href="goal-list.php" class = "navi">Goal list</a>
 					<a href="goal-add.php" class = "navi">Add new goal</a>
		</div>

		<div class = "main">
			<h1 align = "center">Let's add some goals!</h1><br><br>
		<?php
			if(isset($_POST['submit']))
			{
				$user_id=$user_data['user_id'];

				$Goal_name = mysql_real_escape_string($_POST['Goal_name']);
				$Goal_description=mysql_real_escape_string($_POST['Goal_description']);
				$Goal_type=mysql_real_escape_string($_POST['Goal_type']);
				$Start_date=mysql_real_escape_string($_POST['Start_date']);
				$End_date=mysql_real_escape_string($_POST['End_date']);

				$query1=mysql_query("insert into goal values('$user_id','','$Goal_name','$Goal_description', '$Goal_type', '$Start_date', '$End_date')");
				echo "insert into goal values('$user_id','','$Goal_name','$Goal_type', '$Goal_description', '$Start_date', '$End_date')";

				if($query1)
				{
					header("location:goal-list.php");
				}
			}
		?>
			<form method="post" action="" class="register">
						<input type="text" name="Goal_name" placeholder = "Name of your goal"><br>

						<input type="text" name="Goal_type" placeholder = "Goal type"><br>

						<input type="text" name="Goal_description" placeholder = "Brief description"><br>

						<input type="text" name="Start_date" placeholder = "Start date"><br>

						<input type="text" name="End_date" placeholder = "End date"><br><br>

						<input type="submit" name="submit" value = "Add new" class = "registerBtn"/> <br>
			</form>
		</div>
	</body>
	<?php include 'includes/overall/footer.php';?>
</html>
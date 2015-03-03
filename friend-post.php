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
 					<a href="friend-news.php" class = "navi">New feeds</a>
 					<a href="friend-post.php" class = "navi">Post a status</a>
		</div>

		<div class = "main">
			<h1 align = "center">[POST A STATUS]</h1><br>
			<h3>Tell us what you think...</h3><br>
			
			<?php 
				$con = mysqli_connect("localhost","root","","lr");
				if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$last_name = $user_data['last_name'];
				$first_name = $user_data['first_name'];
				$user = $first_name." ".$last_name;

				if (!isset($_POST['action']) || $_POST['action']==""){
					$messages= "";
				} else {
					$messages= "";
					$messages =$_POST['message'];
					if ($messages != ""){
						$sql= " INSERT INTO newfeeds (user, content) VALUES ('$user','$messages')";
						if (!mysqli_query($con,$sql)) { 
						die('Error: ' . mysqli_error($con)); 
						} else {
							header("Location: friend-news.php");
						}		
					}
				}
			?>

			<div class="chatbox">
				<form action ="friend-post.php" method ="POST">
					<textarea rows="5" cols="50" name="message"></textarea><br><br>
					<input type ="submit" name = "action" value = "Post" class='postBtn'>
				</form>
			</div>
		</div>
	</body>
	<?php include 'includes/overall/footer.php';?>
</html>
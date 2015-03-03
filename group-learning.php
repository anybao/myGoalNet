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
 					<a href="group-free.php" class = "navi">Free group</a>
 					<a href="group-startup.php" class = "navi">Start-up group</a>
 					<a href="group-learning.php" class = "navi">Learning group</a>
		</div>

		<div class = "main">
			<h1 align = "center">[Learning Group]</h1>
			<h3 align = "center">Typing any question you got about leaning problem...</h3><br><br>
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
						$sql= " INSERT INTO learning (user, message) VALUES ('$user','$messages')";
						if (!mysqli_query($con,$sql)) { 
						die('Error: ' . mysqli_error($con)); 
						}					
					}
				}
			?>

			<div class="messchat">
				<?php
					$display = mysqli_query($con, "SELECT * from learning ORDER BY time DESC");
					while ($row = mysqli_fetch_array($display)){
					echo "<b>".$row['user']."</b>"." : "."<font color = #416C6C>".$row['message']."</font>"; 
					echo "<br><br>";
					echo chr(13);
				}
				?>
				</div>
					<form action ="group-learning.php" method ="POST">
					<br>
					<input type="text" name="message" value="" placeholder="Type a message..."class = "inmes"/>
					<input type ="submit" name = "action" value = "Send" class='funcBtn2'>
					</form>

				
			</div>
		</div>
	</body>
<?php include 'includes/overall/footer.php';?>
</html>
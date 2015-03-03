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
			<h1 align = "center">[NEW FEEDS]</h1><br>
			<?php 
				$con = mysqli_connect("localhost","root","","lr");
				if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			?>

			<div class = "scrollbox">
				<?php
					$display = mysqli_query($con, "SELECT * FROM newfeeds ORDER BY date DESC");
					while ($row = mysqli_fetch_array($display)){
					echo "<div class='box'>";
					echo "<b class = 'man'>".$row['user']."</b>"." - "."[".$row['date']."]"." <br> "."<font class = 'status'>".$row['content']."</font>"."<br>"; 
					echo chr(13);
					echo "</div><br>";
					}
				?>
			</div>
		</div>
	</body>
	<?php include 'includes/overall/footer.php';?>
</html>
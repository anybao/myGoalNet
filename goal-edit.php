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

	<?php
		if(isset($_GET['id'])!= NULL)
		{
			$PID=(int) $_GET['id'];
			$query1=mysql_query("select * from goal where PID='$PID'");
			$query2=mysql_fetch_array($query1);
		}

		if(isset($_POST['submit']))
		{
			$Goal_name=$_POST['Goal_name'];
			$Goal_description=$_POST['Goal_description'];
			$Goal_type=$_POST['Goal_type'];
			$Start_date=$_POST['Start_date'];
			$End_date=$_POST['End_date'];
			$query3=mysql_query("
				UPDATE goal SET 
				Goal_name='$Goal_name', 
				Goal_description='$Goal_description', 
				Goal_type='$Goal_type', 
				Start_date='$Start_date', 
				End_date='$End_date' 
				WHERE PID='$PID'");
			
			if($query3)
			{
				header('location:goal-list.php');
			}
		}
	?>

	<h2>[EDIT]</h2>
	<form method="post" action="" class = "register">
		Goal Name:<br><input type="text" name="Goal_name" value="<?php echo $query2['Goal_name'] ;?>" /><br />
		Goal Description:<br><input type="text" name="Goal_description" value="<?php echo $query2['Goal_description'];?>" /><br />
		Goal Type:<br><input type="text" name="Goal_type" value="<?php echo $query2['Goal_type'] ;?>" /><br />
		Start Date:<br><input type="text" name="Start_date" value="<?php echo $query2['Start_date'] ;?>" /><br />
		End Date:<br><input type="text" name="End_date" value="<?php echo $query2['End_date'] ;?>" /><br /><br />
		<br>
		<input type="submit" name="submit" value="Update" class = "registerBtn" />
	</form>

	</div>
	</body>
<?php include 'includes/overall/footer.php';?>
</html>
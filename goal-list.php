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
			<h1 align = "center">[MY GOALS]</h1><br>
			<table align='center' border='1' style='color:red'>
				<tr>
					<td class = "titleTable">Goal name</td>
					<td class = "titleTable">Goal Description</td>
					<td class = "titleTable">Goal type</td>
					<td class = "titleTable">Start date</td>
					<td class = "titleTable">End date</td>
	<?php
		$user_id=$user_data['user_id'];

		$query1=mysql_query("SELECT PID, Goal_name, Goal_description, Goal_type , Start_date, End_date FROM goal WHERE `user_id` = '$user_id'");
		while($query2=mysql_fetch_array($query1))
		{
			echo "<tr><td class='goalContent'>".$query2['Goal_name']."</td>";
			echo "<td class='goalContent'>".$query2['Goal_description']."</td>";
			echo "<td class='goalContent'>".$query2['Goal_type']."</td>";
			echo "<td class='goalContent'>".$query2['Start_date']."</td>";
			echo "<td class='goalContent'>".$query2['End_date']."</td>";
			
			echo "<td class='funcBtn'><a href='goal-edit.php?id=".$query2['PID']."'>Edit</a></td>";
			echo "<td class='funcBtn'><a href='goal-delete.php?id=".$query2['PID']."'>Delete</a></td><tr>";
		}
	?>
	</ol>
	</table>

</div>
	</body>
<?php include 'includes/overall/footer.php';?>
</html>
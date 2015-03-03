<?php
	if (empty($_POST) === false && empty($errors) === true) {
		$setup_data = array(
				'user_id',
				'main_goal_1' 		=> $_POST['main_goal_1'],
				'sub_goal_1' 		=> $_POST['sub_goal_1'],
				'sub_goal_2' 		=> $_POST['sub_goal_2'],
				'sub_goal_3' 		=> $_POST['sub_goal_3'],
				'main_goal_2' 		=> $_POST['main_goal_2'],
				'sub_goal_4' 		=> $_POST['sub_goal_4'],
				'sub_goal_5' 		=> $_POST['sub_goal_5'],
				'sub_goal_6' 		=> $_POST['sub_goal_6'],
				'main_goal_3' 		=> $_POST['main_goal_3'],
				'sub_goal_7' 		=> $_POST['sub_goal_7'],
				'sub_goal_8' 		=> $_POST['sub_goal_8'],
				'sub_goal_9' 		=> $_POST['sub_goal_9'],
			);
		setup_goal($setup_data);
		//header("Location: test.php");
		//echo "Success!";
		//exit();
	} else if(empty($errors) === false) {
		echo output_errors($errors);
	}
?>
What do you want to do in your life? <br>
Let's setup your goals now!<br><br>
<form action = "" method = "POST">
	<input type = "text" name = "main_goal_1" class = "maingoal" placeholder = "Type your goals about health here..."><br>
	<input type = "text" name = "sub_goal_1" placeholder = "Subgoal 1">
	<input type = "text" name = "sub_goal_2" placeholder = "Subgoal 2">
	<input type = "text" name = "sub_goal_3" placeholder = "Subgoal 3"> <br><br>

	<input type = "text" name = "main_goal_2" class = "maingoal" placeholder = "Type your goals about wealth here..."><br>
	<input type = "text" name = "sub_goal_4" placeholder = "Subgoal 1">
	<input type = "text" name = "sub_goal_5" placeholder = "Subgoal 2">
	<input type = "text" name = "sub_goal_6" placeholder = "Subgoal 3"> <br><br>

	<input type = "text" name = "main_goal_3" class = "maingoal" placeholder = "Type your goals about family here..."><br>
	<input type = "text" name = "sub_goal_7" placeholder = "Subgoal 1">
	<input type = "text" name = "sub_goal_8" placeholder = "Subgoal 2">
	<input type = "text" name = "sub_goal_9" placeholder = "Subgoal 3"><br>
	
	<input type = "submit" name = "submit" value = "Submit" class = "registerBtn">

</form>

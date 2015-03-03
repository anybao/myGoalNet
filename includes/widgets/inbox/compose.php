Let's compose a message here!

<?php

	$reciever_id = $_POST['reciever_id'];
	$content = $_POST['comment'];
	$sql = "insert into inbox values ('$reciever_id', '$content')";
	mysql_query($sql);
?>

<form method = "POST" action = ""><br><br><br>
	Reciever:<br><input type = "text" name = "reciever_id"><br>
	Content:<br><textarea rows="4" cols="50" name="comment"></textarea>
	<br><br>

	<input type = "submit" value = "Send now" class = "registerBtn">
</form>
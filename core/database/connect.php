<?php
	$connect_error = 'Sorry, connecting problem';
	mysql_connect('localhost','root','') or die($connect_error);
	mysql_select_db('lr') or die($connect_error);
	$query=mysql_connect("localhost","root","");
mysql_select_db("lr",$query);
?>
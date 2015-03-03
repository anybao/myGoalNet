<?php
include 'core/database/connect.php';
if(isset($_GET['id'])!=NULL)
{
$PID=$_GET['id'];
$query1=mysql_query("delete from goal where PID='$PID'");
if($query1)
{
header('location:goal-list.php');
}
}
?>
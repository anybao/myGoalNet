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
 					<a href="#" class = "navi">Compose new message</a>
 					<a href="#" class = "navi">Sent</a>
		</div>

	<div class = "main">

		<h1>Chat Box</h1>
		<h3>(Not ready yet, will be updated soon...)</h3>
			<script>
			function submitChat() {
				if(form1.uname.value == '' || form1.msg.value == '') {
					alert('ALL FIELDS ARE MANDATORY!!!!');
					return;
				}
				var uname = form1.uname.value;
				var msg = form1.msg.value;
				var xmlhttp = new XMLHttpRequest();
				
				xmhlttp.onreadystatechange = function(){
					if(mlhttp.readyState==4&&xmlhttp.status==200){
						document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
				xmlhttp.send();
			}
			</script>
		<form name="form1">
			Enter reciever: <br><input type="text" name="uname" /><br/>
			Your Message: <br/>
			<textarea name="msg" cols = "50" rows = "10"></textarea><br><br></form>
			<button onclick = "#" class = "send">Send</button><br /><br />
		<div id="chatlogs">
			LOADING CHATLOGS PLEASE WAIT ......
		</div>
	</div>
	</body>
	<?php include 'includes/overall/footer.php';?>
</html>
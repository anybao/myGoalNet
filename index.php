<?php 
	include 'core/init.php';
	include 'includes/overall/header.php';
?>


<div class = "main">
	<?php
		if (isset($_SESSION['user_id'])) {
			include 'includes/widgets/firstin.php';
		} else {
			include 'includes/widgets/register.php';
		}
	?>
</div>

<?php include 'includes/overall/footer.php';?>
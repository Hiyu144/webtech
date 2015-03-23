<!DOCTYPE HTML>
<html>
	<head>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/index/') ?>'">Home</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/up/') ?>'">Upload</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/join/') ?>'">Signup/Login</button>
	</head>
	<?php 
		echo $mess . "</br>";
		echo "<a href='" . site_url('/pictoria/join/') . "'>Go back</a>";
	?>
</html>
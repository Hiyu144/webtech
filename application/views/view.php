<!DOCTYPE HTML>
<html>
	<head>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/index/') ?>'">Home</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/up/') ?>'">Upload</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/join/') ?>'">Signup/Login</button>
	</head>
	<?php session_start(); ?>
	<div>
		<img src="<?php echo '../../..' . $pathimg . $linkimg; ?> " />
	</div>
	<div>
		<p>Direct Link</p>
		<input onClick="this.select();" type="text" value="<?php echo 'http://localhost/ci' . $pathimg . $linkimg; ?>" />
	</div>	
	<div>
		<p>Page Link</p>
		<input onClick="this.select();" type="text" value="<?php echo site_url('/pictoria/view/') . "/" . $imgpage; ?>" />
	</div>
	<div>
		<p>Views: <?php echo $visit; ?></p>
	</div>
	<?php if (isset($_SESSION['username'])){
		echo "<button onclick='location.href=\"" . site_url('/pictoria/cool/') . "\"'>Cool!</button>" . "</br>";
	} ?>
</html>

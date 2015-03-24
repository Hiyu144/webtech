<!DOCTYPE HTML>
<html>
	<head>
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<?php session_start(); ?>
	<div>
		<img src="<?php echo '../../../uploads/anon/' . $linkimg; ?> " />
	</div>
	<div>
		<p>Direct Link</p>
		<input onClick="this.select();" type="text" value="<?php echo 'http://localhost/ci/uploads/anon/' . $linkimg; ?>" />
	</div>	
	<div>
		<p>Page Link</p>
		<input onClick="this.select();" type="text" value="<?php echo site_url('/pictoria/view/') . "/" . $imgpage; ?>" />
	</div>
	<div>
		<p>Views: <?php echo $visit; ?></p>
	</div>
	<?php if (isset($_SESSION['username'])){
		echo $_SESSION['username'];
		echo "<button onclick='location.href=\"" . site_url('/pictoria/cool/') . "\"'>Cool!</button>" . "</br>";
		echo "<a href='" . site_url('/pictoria/logout/') . "'>Log out</a>";
	} ?>
</html>

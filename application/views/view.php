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
		<h3>Direct Link</h3>		
		<input class = "form-control" onClick="this.select();" type="text" value="<?php echo 'http://localhost/ci/uploads/anon/' . $linkimg; ?>" />
		<h3>Page Link</h3>
		<input class = "form-control"  onClick="this.select();" type="text" value="<?php echo site_url('/pictoria/view/') . "/" . $imgpage; ?>" />
	</div>
	<div>
		<h3>Views: <?php echo $visit; ?></h3>
	</div>
	<?php if (isset($_SESSION['username'])){
		echo $_SESSION['username'];
		echo "<button onclick='location.href=\"" . site_url('/pictoria/cool/') . "\"'>Cool!</button>" . "</br>";
		echo "<a href='" . site_url('/pictoria/logout/') . "'>Log out</a>";
	} ?>
</html>

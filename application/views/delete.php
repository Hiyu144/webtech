<!DOCTYPE HTML>
<html>
	<head>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/index/') ?>'">Home</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/up/') ?>'">Upload</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/join/') ?>'">Signup/Login</button>
	</head>
	<button onclick = "window.location.href = '<?php echo site_url('/pictoria/delete_done/') . "/" .$this->uri->segment(3); ?>'">Yah</button>
	<button onclick = "window.location.href = '<?php echo site_url('/pictoria/home/'); ?>'">Nah</button>
<html>
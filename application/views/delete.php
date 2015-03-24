<!DOCTYPE HTML>
<html>
	<head>
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<button onclick = "window.location.href = '<?php echo site_url('/pictoria/delete_done/') . "/" .$this->uri->segment(3); ?>'">Yah</button>
	<button onclick = "window.location.href = '<?php echo site_url('/pictoria/home/'); ?>'">Nah</button>
<html>
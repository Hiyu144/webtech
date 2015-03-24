<!DOCTYPE HTML>
<html>
	<head>
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<div class="container">
		<h1>Do you really want to delete this???</h1>
		<button class="btn btn-success" onclick = "window.location.href = '<?php echo site_url('/pictoria/delete_done/') . "/" .$this->uri->segment(3); ?>'">Yah</button>
		<button class="btn btn-warning" onclick = "window.location.href = '<?php echo site_url('/pictoria/index/'); ?>'">Nah</button></div>
<html>
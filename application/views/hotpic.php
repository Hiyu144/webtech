<!DOCTYPE HTML>
<html>
	<head>		
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<body>
		<?php
			for ($i = 0; $i < 7; $i++){
				echo $arrLink['$i'];
				echo $arrPage['$i'];
			}
		?>
	</body>
</html>
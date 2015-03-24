<!DOCTYPE HTML>
<html>
	<head>		
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/hotpic.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<body>
		<center>
		<div class = "container">
		<?php
			if (isset($mess)){
				echo '<h1>' . $mess . '</h1>';
			}else{
				for ($i = 0; $i < $rows; $i++){
					echo '<div class="col-sm-6 col-md-4 col-lg-3">
							<div class="">
								<a href="' . site_url('/pictoria/view/') . "/" . $arrPage[$i] . '">
								<img width="200" height="200" src="' . base_url() . '/' . $arrLink[$i] . '" />
								</a>
							</div>
						</div>';
				}
			}
		?>
		</div>
		</center>
	</body>
</html>

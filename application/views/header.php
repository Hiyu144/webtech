<html>
	<head>
		<title>Pictoria!!!</title>
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
		<script>
			$(document).ready(function () {
				$('.dropdown-toggle').dropdown();
			});
		</script>
	</head>
		<body>
			<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url('/pictoria/index/'); ?>">Pictoria</a>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo site_url('/pictoria/up/'); ?>">Upload</a></li>
						<li><a href="<?php echo site_url('/pictoria/join/'); ?>">Signup/Login</a></li>
					</ul>
					<?php
						if (isset($_SESSION['username'])){
							echo '<ul class="nav navbar-nav navbar-right">
								<li><a href="#">' . $_SESSION['username'] . '</a></li>
								<li class="dropdown">
									<a href="#" class="btn dropdown-toggle" data-toggle="dropdown">Stuff to do<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="' . site_url('/pictoria/album/') . '">Album</a></li>
										<li><a href="' . site_url('/pictoria/favorite/') . '">Favorite</a></li>
										<li><a href="' . site_url('/pictoria/logout/') .'">Logout</a></li>
									</ul>
								</li>
							</ul>';
						}
					?>
					<!-- <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					</ul> -->
				</div><!-- /.navbar-collapsezzzz -->
			</nav>
			</div>
		</body>
</html>
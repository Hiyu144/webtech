<!DOCTYPE HTML>
<html>
	<head>
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<div class="container">
	<div class="thumbnail">
		<img src="<?php echo base_url() . $img['pathimg'] . $img['linkimg']; ?> " />
	</div>
	<div>
		<h3>Direct Link</h3>		
		<input class = "form-control" onClick="this.select();" type="text" value="<?php echo base_url() . $img['pathimg'] . $img['linkimg']; ?>" />
		<h3>Page Link</h3>
		<input class = "form-control" onClick="this.select();" type="text" value="<?php echo site_url('/pictoria/view/') . "/" . $img['imgpage']; ?>" />
	</div>
	<?php if (isset($_SESSION['username'])){
		$cooler = site_url('/pictoria/cool/') . "/" . $img['ID'];
		if ($_SESSION['username'] == $img['owner']){
			echo '<h3>Share mode</h3>';
			echo '<div><form action="' . site_url('/pictoria/modeuser/') . '" method="POST">';
			echo '<div class="radio"><label><input type="radio" name="mode[]" value="0-' . $img['imgpage'] . '" checked>Public</label></div>';
			echo '<div class="radio"><label><input type="radio" name="mode[]" value="1-' . $img['imgpage'] . '">Private</label></div>';
  			echo '<input class="btn btn-warning" type="submit" value="Submit configiration" name = "modes"/></div></form>';
		}
	}else{
		$cooler = site_url('/pictoria/join/');
	} ?>
	<div style="margin-top:10px"><button class="btn btn-success" onclick="location.href='<?php echo $cooler; ?>'">Cool!</button>
	Views: <?php echo $img['visit']; ?> Cool: <?php echo $upvote; ?>
	</div></div></div>
</html>
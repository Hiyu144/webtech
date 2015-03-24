<!DOCTYPE HTML>
<html>
	<div class="container">
	<div>
		<img src="<?php echo base_url() . $pathimg . $linkimg; ?> " />
	</div>
	<div>
		<p>Direct Link</p>
		<input onClick="this.select();" type="text" value="<?php echo base_url() . $pathimg . $linkimg; ?>" />
	</div>	
	<div>
		<p>Page Link</p>
		<input onClick="this.select();" type="text" value="<?php echo site_url('/pictoria/view/') . "/" . $imgpage; ?>" />
	</div>
	<div>
	<?php if (isset($_SESSION['username'])){
		echo "<button onclick='location.href=\"" . site_url('/pictoria/cool/') . "\"'>Cool!</button>";
	} ?>
	Views: <?php echo $visit; ?>
	Cool: <?php echo $cool; ?>
	</div>
</html>

<!DOCTYPE HTML>
<html>
	<div>
		<img src="<?php echo '../../../uploads/anon/' . $linkimg; ?> " />
	</div>
	<div>
		<input onClick="this.select();" type="text" value="<?php echo 'http://localhost/ci/uploads/anon/' . $linkimg; ?>" />
	</div>	
	<div>
		<input onClick="this.select();" type="text" value="<?php echo site_url('/pictoria/view') . "/" . $imgpage; ?>" />
	</div>
</html>

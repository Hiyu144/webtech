<html>
	<head>		
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<body>
		
		<!-- <div class="page-header"><center><h1>Click on each tab to view the uploaded image(s)</h1></center></div>	 -->
		<div class="container"><div class="page-header"><center><h1>Bấm vào từng tab mà xem hình, chỉnh các thứ rồi submit nhé</h1></center></div>
		<form action="<?php echo site_url('/pictoria/modeanon/');?>" method="POST">
		<input class="btn btn-warning" type="submit" value="Submit configiration" name = "modes"/></div>
		<div class="container">


<?php
	echo '<ul class="nav nav-tabs" role="tablist">';	    
	    for ($i = 0; $i < $numb; $i++){
			echo '<li><a href="#'. $i .'" role="tab" data-toggle="tab"> Image ';
			echo $i+1;
			echo '</a></li>';  
		}
	   	echo '</ul>';
	echo '<div class="tab-content">';
	for ($i = 0; $i < $numb; $i++){
		echo '<div class="tab-pane" id="' . $i.'">';
		echo '<div class="row">
  			  <div class="col-sm-6 col-md-4">
  			    <div class="thumbnail">
  			      <img src = "' . base_url() . "/" . $linkar[$i] . '" />
  			      <div class="caption">
  			        <h3>Quantumized lv. ';
  			        echo $i+1;
  			        echo '</h3>';
  			        echo '<h3>Direct Link</h3>';
		echo '<div><input class = "form-control" onClick="this.select();" type="text" value="' . base_url() . $linkar[$i] . '" /></div>';
		echo '<h3>Page Link</h3>';
		echo '<div><input class = "form-control" onClick="this.select();" type="text" value="' . site_url('/pictoria/view') . "/" . $pageIma[$i] . '"/></div>';
		echo '<h3>Delete Link</h3>
			  <h4>(Appear here only)</h4>';
		echo '<div><input class = "form-control" onClick="this.select();" type="text" value="' . site_url('/pictoria/delete') . "/" . $keyar[$i] . "-" . $pageIma[$i] . '" /></div>';
		echo '<h3>Share mode</h3>';
		echo '<div class="radio"><label><input type="radio" name="mode[' . $i . ']" value="0-' . $pageIma[$i] . '" checked>Public</label></div>';
		echo '<div class="radio"><label><input type="radio" name="mode[' . $i . ']" value="1-' . $pageIma[$i] . '">Private</label></div>';
  		echo '<h3>Expire time</h3>';
		echo '<div><select class="form-control" size="1" name="exptime[]">
				<option value="0">Never</option>
				<option value="86400">One day</option>
				<option value="604800">One week</option>
				<option value="2592000">One month (30 days)</option>
				<option value="31536000">One year (365 days)</option></select></div>';
			echo '</div>
  			    </div>
  			  </div>
  			</div>';
		
		echo '</div>';
	}
	echo '</div>';
?>			
		</div>
		</form>
	</body>
</html>



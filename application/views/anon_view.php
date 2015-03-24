<html>
	<head>		
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<body>
		
		<!-- <div class="page-header"><center><h1>Click on each tab to view the uploaded image(s)</h1></center></div>	 -->
		<div class="container"><div class="page-header"><center><h1>Bấm vào từng tab mà xem hình nhé</h1></center></div></div>
		<div class="container">


<?php
	$response = $this->uri->segment(3);
	$urlArr = explode("&", $response);
	$length = count($urlArr)-1;
	echo '<ul class="nav nav-tabs" role="tablist">';	    
	    for ($i = 0; $i < $length; $i++){
		$arr = explode("@", $urlArr[$i]);
		$page = explode(".", $arr[0]);
		echo '<li><a href="#'. $i .'" role="tab" data-toggle="tab"> Image ';
		echo $i+1;
		echo '</a>
	        </li>';  }
	   	echo '</ul>';

	echo '<div class="tab-content">';
	for ($i = 0; $i < $length; $i++){
		$arr = explode("@", $urlArr[$i]);
		$page = explode(".", $arr[0]);
		
		echo '<div class="tab-pane" id="' . $i.'">';

		echo '<div class="row">
  			  <div class="col-sm-6 col-md-4">
  			    <div class="thumbnail">
  			      <img src = "../../../uploads/anon/' . $arr[0] . '" />
  			      <div class="caption">
  			        <h3>Quantumized lv. ';
  			        echo $i+1;
  			        echo '</h3>';
  			        echo '<h3>Direct Link</h3>';
		echo '<div><input class = "form-control" onClick="this.select();" type="text" value="http://localhost/ci/uploads/anon/' . $arr[0]. '" /></div>';
		echo '<h3>Page Link</h3>';
		echo '<div><input class = "form-control" onClick="this.select();" type="text" value="' . site_url('/pictoria/view') . "/" . $page[0] . '"/></div>';
		echo '<h3>Delete Link</h3>
			  <h4>(Appear here only)</h4>';
		echo '<div><input class = "form-control" onClick="this.select();" type="text" value="' . site_url('/pictoria/delete') . "/" . $arr[1] . '" /></div>';
  			      echo '</div>
  			    </div>
  			  </div>
  			</div>';
		
		echo '</div>';
	}
	echo '</div>';
?>			
		</div>

	</body>
</html>



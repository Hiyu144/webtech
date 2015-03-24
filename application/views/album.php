<!DOCTYPE HTML>
<html>
	<head>		
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<div class="container">
	<h1>These are all your stuff.</h1>
	<h5>Check what you want to remove</h5>

	<?php 
		$i=0;
		echo '<form action="' . site_url('/pictoria/memdelete/') . '" method="POST">';
		echo '<div><input class="btn btn-warning" type="submit" value="Delete checked images" name = "delete"/></div>';
		foreach($data as $image){
			$i=$i+1;
			$imag = explode(".", $image);
			
					echo '
			  			  <div class="col-sm-6 col-md-4">
			  			    <div class="thumbnail">
			  			    	<a href="' . site_url('/pictoria/view/') . "/" . $imag[0] . '">
			  			      <img src="' . base_url() . '/uploads/' . $_SESSION['username'] . "/" . $image . '" />
			  			      
			  			        </a>
			  			        <input type="checkbox" id="check[' . $i . ']" name="remove[' . $i . ']" value=' . $image . '/>
			  			        
			  			      
			  			    </div>
			  			  </div>
			  			';


		}
		echo '</form>';
		
		
	?>
</html>

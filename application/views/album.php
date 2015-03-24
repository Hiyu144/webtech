<!DOCTYPE HTML>
<html>
	<div class="container">
	<h1>These are all your stuff</h1>
	<?php 
		$i=0;
		echo '<form action="' . site_url('/pictoria/memdelete/') . '" method="POST">';
		foreach($data as $image){
			$i=$i+1;
			$imag = explode(".", $image);
			echo '<a href="' . site_url('/pictoria/view/') . "/" . $imag[0] . '">';
			echo '<img style="margin-bottom:5px" height="120" width="120" src="' . base_url() .
				 '/uploads/' . $_SESSION['username'] . "/" . $image . '"/></a>';
			echo '<input type="checkbox" id="check[' . $i . ']" name="remove[' . $i . ']" value=' . $image . '/>';
		}
		echo '<div><input type="submit" value="Delete checked images" name = "delete"/></div></form>';
	?>
</html>
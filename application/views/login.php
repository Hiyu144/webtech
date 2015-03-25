<!DOCTYPE HTML>
<html>
	<div class="container">
		<?php
			if (!isset($mess)){
				header('Location: member');    
			}else{
				echo $mess . "</br>";
			}
		?>
</html>
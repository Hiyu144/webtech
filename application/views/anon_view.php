<?php 
	$response = $this->uri->segment(3);
	$urlArr = explode("&", $response);
	$length = count($urlArr)-1;
	for ($i = 0; $i < $length; $i++){
		$arr = explode("@", $urlArr[$i]);
		$page = explode(".", $arr[0]);
		echo '<div><img src = "../../../uploads/anon/' . $arr[0] . '" /></div>';
		echo '<p>Direct Link</p>';
		echo '<div><input onClick="this.select();" type="text" value="http://localhost/ci/uploads/anon/' . $arr[0]. '" /></div>';
		echo '<p>Page Link</p>';
		echo '<div><input onClick="this.select();" type="text" value="' . site_url('/pictoria/view') . "/" . $page[0] . '"/></div>';
		echo '<p>Delete Link</p>';
		echo '<div><input onClick="this.select();" type="text" value="' . site_url('/pictoria/delete') . "/" . $arr[1] . '"/></div>';
	}
?>
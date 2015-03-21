<?php
	class Blog extends CI_Controller {
		function index(){
			$data['todo_']='Your title';
			$this->load->view('blogview',$data);
		}
	}
?>
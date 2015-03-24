<?php
	class students extends CI_Controller {
		public function index(){
			if ($_SERVER['REQUEST_METHOD'] == "GET"){
				$this->GET();
			}else if ($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->POST();
			}
 		}
		
		public function __construct(){
			parent::__construct();
			$this->stdList = array("wut", "wat");
		}
		
		public function GET(){
			$i = 0;
			for ($i = 0; $i < 2; $i++) {
				echo ($this->stdList[$i]) . "</br>";
			}
		}
		
		public function POST(){
			if (isset($_POST['haha'])){
				array_push($this->stdList, $_POST['haha']);
			}
			echo $_POST['haha'];
		}
		
		public function PUT(){
			
		}
		
		public function DELETE(){
		
		}
	}
?>
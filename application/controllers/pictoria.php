<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pictoria extends CI_Controller {
	
	public function anon(){
		return getcwd() . '/uploads/anon/';
	}
	 
	public function index() {
		$this->load->view('pictoria_view');
	}
	
	public function upload() {
		if (!empty($_FILES)) {
			$dump = $_FILES['file']['name'];
			$tempFile = $_FILES['file']['tmp_name'];
			$ext = pathinfo($dump, PATHINFO_EXTENSION);
			$imgPage = uniqid();
			$fileName = $imgPage. '.' .$ext;
			$key = uniqid();
			$targetPath = getcwd() . '/uploads/anon/';
			$targetFile = $targetPath . $fileName ;
			move_uploaded_file($tempFile, $targetFile);
			$this->db->insert('images', array('linkimg' => $fileName, 'keyimg' => $key, 'imgpage' => $imgPage));
			$response = $fileName . '@' . $key . '-' . $imgPage;
			echo $response;
		}
    }
	
	public function anon_view($response) {
		$this->load->view("anon_view");
	}
	
	public function delete($link){ 
		$linkArr = explode("-", $link);
		$query = $this->viewFunc($linkArr[1]);
		if (($query->num_rows() != 0) && ($query['keyimg'] == $linkArr[0])) {
			$this->load->view("delete_done");
		}else{
			$this->load->view("not_found");
		}
		
	}
	
	public function view($page){
		$query = $this->viewFunc($page);
		$img = $query->row_array();
		$this->load->view('view', $img);
	}
	
	public function viewFunc($page){
		return $this->db->get_where('images', array('imgpage' => $page), 1);
	}
}
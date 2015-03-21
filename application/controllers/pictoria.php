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
			$this->db->insert('images', array('linkimg' => $fileName, 'keyimg' => $key, 'imgpage' => $imgPage, 'visit' => 0));
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
		$img = $query->row_array();
		if (($query->num_rows() != 0) && ($img['keyimg'] == $linkArr[0])) {
			$this->load->view("delete");
		}else{
			$this->load->view("not_found");
		}
	}
	
	public function delete_done($link){
		$linkArr = explode("-", $link);
		$query = $this->viewFunc($linkArr[1]);
		$img = $query->row_array();
		$path = getcwd() . '/uploads/anon/' . $img['linkimg'];
		unlink($path);
		$this->db->delete('images', array('ID' => $img['ID']));
		$this->load->view("delete_done");
	}
	
	public function view($page){
		$query = $this->viewFunc($page);
		$img = $query->row_array();
		if ($query->num_rows() != 0){
			$visitor = $img['visit'] + 1;
			$this->db->where('ID', $img['ID']);
			$this->db->update('images', array('visit' => $visitor));
			$this->load->view('view', $img);
		}else{
			$this->load->view("not_found");
		}
	}
	
	public function viewFunc($page){
		return $this->db->get_where('images', array('imgpage' => $page), 1);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pictoria extends CI_Controller {
	
	public function index() {
		session_start();
		$this->load->view('header');
		$this->load->view('homepage');
		$this->hotpic();
	}
	
	public function hotpic() {
		$this->db->select()->from('images');
		$this->db->order_by('visit', 'desc');
		$query = $this->db->get();
		$i = 0;
		$arrLink = [];
		$arrPage = [];
		foreach ($query->result() as $row){
			$arrLink['$i'] = $row->pathimg . $row->linkimg;
			$arrPage['$i'] = $row->imgpage;
			$i = $i + 1;
			echo $arrLink['$i'];
			echo $arrPage['$i'];
		}
		$data = array('arrLink' => $arrLink, 'arrPage' => $arrPage);
		$this->load->view('hotpic', $data);
	}
	
	public function signup(){
		session_start();
		$this->load->view('header');
		$name = $_POST['name'];
		$uname = $_POST['uname'];
		$pass = $_POST['password'];
		$passconfirm = $_POST['passwordConfirm'];
		$mail = $_POST['mail'];
		$gender = $_POST['gender'];
		$bday = $_POST['bday'];
		$country = $_POST['country'];
		$countryS = implode("", $country);
		$query1 = $this->db->get_where('form', array('Username' => $uname), 1);
		$query2 = $this->db->get_where('form', array('Email' => $mail), 1);
		if ($query1->num_rows()!=0) {
			$data = array('mess' => "That username has already been taken!");
			$this->load->view('signup', $data);
		}else{
			if ($query2->num_rows()!=0) {
				$data = array('mess' => "That email has already been registered!");
				$this->load->view('signup', $data);
			}else{
				$data = array('mess' => "Register was successful, GLHF. Please login to begin!");
				$this->db->insert('form', array('Name' => $name,
												'Username' => $uname,
												'Password' => $pass,
												'Email' => $mail,
												'Gender' => $gender,
												'DOB' => $bday,
												'Country' => $countryS));
				mkdir (getcwd() . '/uploads/' . $uname, 0700);
				$this->load->view('signup', $data);
			}
		}
	}
	
	public function join(){
		session_start();
		$this->load->view('header');
		$this->load->view('join');
	}
	
	public function login() {
		session_start();
		$this->load->view('header');
		$unameLog = $_POST['unameLog'];
		$passLog = $_POST['passLog'];
		$query = $this->db->get_where('form', array('Username' => $unameLog), 1);
		$user = $query->row_array();
		if ($query->num_rows()!=0) {
			if ($user['Password']==$passLog){
				$_SESSION['username'] = $user['Username'];
				$data = array('mess' => "Login successfully...<html> To continue, <a href='" . site_url('/pictoria/member/') . "'>click here</a></html>");
				$this->load->view('login', $data);
			}else{
				$data = array('mess' => "Wrong Password</br><a href='" . site_url('/pictoria/join/') . "'>Try again</a>");
				$this->load->view('login', $data);
			}
		}else{
			$data = array('mess' => "Username not exsist</br><a href='" . site_url('/pictoria/join/') . "'>Try again</a>");
			$this->load->view('login', $data);
		}
	}
	
	public function member(){
		session_start();
		$this->load->view('header');
		$this->load->view('memupload');
	}
	
	public function up() {
		session_start();
		$this->load->view('header');
		if (isset($_SESSION['username'])){
			$this->load->view('memupload');
		}else{
			$this->load->view('anonupload');
		}
	}
	
	public function album() {
		session_start();
		$pathAlbum = getcwd() . '/uploads/' . $_SESSION['username'];
		$dump = directory_map($pathAlbum);
		$data = array('data' => $dump);
		$this->load->view('header');
		$this->load->view('album', $data);
	}
	
	public function memdelete() {
		session_start();
		$remove = $_POST ['remove'];
		foreach($remove as $item) {
			$item = chop($item,"/");
			$pathDel = getcwd() . '/uploads/' . $_SESSION['username'] . "/" . $item;
			if (!unlink($pathDel)) {
				$data = array('mess' => "Error deleting images</br>");
			}else{
				$this->db->delete('images', array('linkimg' => $item));
				$data = array('mess' => "Images were deleted</br>");
			}	
		}
		$this->load->view('header');
		$this->load->view('memdelete', $data);
	}
	
	public function logout(){
		session_start();
		session_destroy();
		$this->index();
	}
	
	public function upload() {
		session_start();
		if (!empty($_FILES)) {
			$dump = $_FILES['file']['name'];
			$tempFile = $_FILES['file']['tmp_name'];
			$ext = pathinfo($dump, PATHINFO_EXTENSION);
			$imgPage = uniqid();
			$fileName = $imgPage. '.' .$ext;
			if (isset($_SESSION['username'])){
				$targetPath = 'uploads/' . $_SESSION['username'] . "/";
				$key = 0;
			}else{
				$targetPath = 'uploads/anon/';
				$key = uniqid();
			}
			$targetFile = getcwd() . "/" . $targetPath . $fileName;
			move_uploaded_file($tempFile, $targetFile);
			$this->db->insert('images', array('linkimg' => $fileName,
											  'pathimg' => $targetPath,
											  'keyimg' => $key, 
											  'imgpage' => $imgPage, 
											  'visit' => 0));
			if (!isset($_SESSION['username'])){
				$response = $fileName . '@' . $key . '-' . $imgPage;
				echo $response;
			}
		}
    }
	
	public function anon_view($response) {
		session_start();
		$this->load->view('header');
		$this->load->view("anon_view");
	}
	
	public function delete($link){ 
		session_start();
		$this->load->view('header');	
		$linkArr = explode("-", $link);
		if (count($linkArr) < 2){
			$this->load->view("not_found");
		}else{
			$query = $this->viewFunc($linkArr[1]);
			$img = $query->row_array();
			if (($query->num_rows() != 0) && ($img['pathimg']=='uploads/anon/') && ($img['keyimg'] == $linkArr[0])) {
				$this->load->view("delete");
			}else{
				$this->load->view("not_found");
			}
		}
	}
	
	public function delete_done($link){
		session_start();
		$this->load->view('header');
		$linkArr = explode("-", $link);
		$query = $this->viewFunc($linkArr[1]);
		$img = $query->row_array();
		$path = getcwd() . '/uploads/anon/' . $img['linkimg'];
		unlink($path);
		$this->db->delete('images', array('ID' => $img['ID']));
		$this->load->view("delete_done");
	}
	
	public function view($page){
		session_start();
		$this->load->view('header');
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
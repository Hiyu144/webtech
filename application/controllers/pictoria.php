<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pictoria extends CI_Controller {
	
	public function index() {
		$this->load->view('header');
		$this->load->view('homepage');
	}
	
	public function signup(){
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
		$this->load->view('header');
		$this->load->view('join');
	}
	
	public function login() {
		$unameLog = $_POST['unameLog'];
		$passLog = $_POST['passLog'];
		$query = $this->db->get_where('form', array('Username' => $unameLog), 1);
		$user = $query->row_array();
		if ($query->num_rows()!=0) {
			if ($user['Password']==$passLog){
				session_start();
				$_SESSION['username'] = $user['Username'];
				echo "Login successfully...<html>To continue,<a href='" . site_url('/pictoria/member/') . "/" . $user['Username'] . "'>click here</a></html>";
			}else{
				echo "Wrong Password</br>";
				echo "<a href='" . site_url('/pictoria/join/') . "'>Try again</a>";
			}
		}else{
			echo "Username not exsist</br>";
			echo "<a href='" . site_url('/pictoria/join/') . "'>Try again</a>";
		}
	}
	
	public function member(){
		session_start();
		$this->load->view('memupload');
	}
	
	public function up() {
		session_start();
		if (isset($_SESSION['username'])){
			$this->load->view('memupload');
		}else{
			$this->load->view('anonupload');
		}
	}
	
	public function album() {
		$this->load->view('header');
		$this->load->view('album');
	}
	
	public function logout(){
		session_start();
		session_destroy();
		$this->index();
	}
	
	public function upload() {
		session_start();
		if (isset($_SESSION['username'])){
			if (!empty($_FILES)) {
				$dump = $_FILES['file']['name'];
				$tempFile = $_FILES['file']['tmp_name'];
				$ext = pathinfo($dump, PATHINFO_EXTENSION);
				$imgPage = uniqid();
				$fileName = $imgPage. '.' .$ext;
				$targetPath = getcwd() . '/uploads/' . $_SESSION['username'] . "/";
				$targetFile = $targetPath . $fileName;
				move_uploaded_file($tempFile, $targetFile);
			}
		}else{
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
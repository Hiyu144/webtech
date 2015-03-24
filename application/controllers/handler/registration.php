<?php
	require_once 'host.php';
	$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die("Failed to connect to MySQL: " . mysql_error());
	mysql_select_db($dbname) or die("Failed to connect to MySQL: " . mysql_error());
	function register(){
		$name = $_POST['name'];
		$uname = $_POST['uname'];
		$pass = $_POST['password'];
		$passconfirm = $_POST['passwordConfirm'];
		$mail = $_POST['mail'];
		$gender = $_POST['gender'];
		$bday = $_POST['bday'];
		$country = $_POST['country'];
		$countryS = implode("", $country);
		$query = "INSERT INTO form (Name, Username, Password, Email, Gender, DOB, Country) VALUES" . 
		   "('$name', '$uname', '$pass', '$mail', '$gender', '$bday', '$countryS')";
		$data = mysql_query ($query)or die(mysql_error());
			if($data){
				mkdir ("storage-$uname", 0700);
				echo "Registration was a success, GLHF...Please login by clicking ";
				echo "<html><a href='join.html'>here</a></html>";
			}
	}
	
	function check(){
		$query="SELECT * FROM form";
		$result=mysql_query($query);
		$rows=mysql_num_rows($result);
		if ($_POST['password'] != $_POST['passwordConfirm']){
			echo "Password verification mismatched, please re-enter";
		}else{
			for ($j=0; $j < $rows; ++$j){
				if (mysql_result($result, $j, 'Username')==$_POST['uname']){
					echo "That Username has already been taken!";
					break;
				}else{
					if (mysql_result($result, $j, 'Email')==$_POST['mail']){
						echo "That Email has already been taken!";
						break;
					}else{
						if ($j==$rows-1){
							register();
					}
				}
			}
		}
	}
}
	
	if(isset($_POST['submit'])){
		check();
	}
	mysql_close($connection);
?>
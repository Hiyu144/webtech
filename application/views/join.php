<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css">
	<title>Let's Play</title>
	
</head>
<body>
	<div class="container">
	<div class="divider"></div>
	<div class="signup">
		<h2>CREATE NEW ACCOUNT</h2>
			<table><tr>				
				<form action="<?php echo site_url('/pictoria/signup'); ?>" onsubmit="submitable()" method="POST">
					<td>Name</td> <td><input class="round" type="text" name="name" maxlength="255" required /></td></tr>
						<tr><td>Username</td> <td><input class="round" type="text" name="uname" maxlength="50" required /></td></tr>
						<tr><td>Password</td> <td><input class="round" type="password" name="password" id="pass1" required /></td></tr>
						<tr><td>Verify Password</td> <td><input class="round" type="password" name="passwordConfirm" id="pass2" onkeyup="matchCheck(); return false;" />
								<span id="confirmMessage" ></span></td></tr>
						<tr><td>Email</td> <td><input class="round" type="text" name="mail" id="email" onkeyup="mailCheck(); submitable(); return false;" required />
								<span id="confirmMail" ></span></td></tr>
						<tr><td>Gender</td><td>
							<input type="radio" name="gender" value="Male" checked />Male</br> 
							<input type="radio" name="gender" value="Female"/>Female</br>
							<input type="radio" name="gender" value="Unknown"/>Unknown</br></td></tr>
						<tr><td>Birthday</td> <td><input class="round" type="date" name="bday" required /></td></tr>
						<tr><td>Country</td>
							<td><select class="round" size="1" name="country[]">
								<option value="VN">Vietnam</option>
								<option value="FR">France</option>
								<option value="UK">United Kingdom</option>
								<option value="FL">Finland</option>
								<option value="NL">Netherland</option>
								<option value="MX">Mexico</option>
							</select></td></tr>
						<tr><td><input class="round" type="submit" name="submit" id="signup" value="Sign up" disabled>
						<input class="round" type="reset" name="clear" value="Clear"><td></tr>
				</form>	
			</table>
	</div>	
	<div class="login">
		<h2>LOGIN</h2>
			<table><tr>				
					<form action="<?php echo site_url('/pictoria/login'); ?>" method="POST">
						<td>Username</td> <td><input class="round" type="text" name="unameLog" maxlength="50" required /></td></tr>
						<tr><td>Password</td> <td><input class="round" type="password" name="passLog" required /></td></tr>
						<tr><td><input class="round" type="submit" name="submitLog" value="Login">
							<input class="round" type="reset" name="clearLog" value="Clear"><td></tr>
					</form>
			</table>
	</div>
		<script type="text/javascript">
		function matchCheck() {
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');
			//Set the colors
			var message = document.getElementById('confirmMessage');
			var goodColor = "#088A08";
			var badColor = "#8A0808";
			//Compare the values in the password field
			//and the confirmation field
			if (pass1.value == pass2.value){
				pass2.style.borderColor = goodColor;
				message.innerHTML = "Passwords Match!";
				return true;
			}else{
				pass2.style.borderColor = badColor;
				message.innerHTML = "Passwords Mismatch!";
				return false;
			}
		};
		
		function mailCheck() {
			var mail = document.getElementById('email');
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var message = document.getElementById('confirmMail');
			var goodColor = "#088A08";
			var badColor = "#8A0808";
			if (mail.value.match(mailformat)){
				mail.style.borderColor = goodColor;
				message.innerHTML = "Good Email Format!";
				return true;
			}else{
				mail.style.borderColor = badColor;
				message.innerHTML = "Bad Email Format!";
				return false;
			}
		};
		
		function submitable(){
			if (matchCheck() && mailCheck()){
				document.getElementById('signup').disabled = false;
			}else{
				document.getElementById('signup').disabled = true;
			}
		}
	</script>
	</div>
</body>
</html>	
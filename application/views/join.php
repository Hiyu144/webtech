<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css">
	<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	<title>Let's Play</title>
	
</head>
<body>
	
	<div class="container">	
	<div class="divider"></div>
	<div class="signup">
		<legend>Create new account</legend>
			<table><tr>				
				<form action="<?php echo site_url('/pictoria/signup'); ?>" onsubmit="return submitable()" method="POST">
					<td>Name</td> <td><input class="form-control" type="text" name="name" maxlength="255" required /></td></tr>
						<tr><td>Username</td> <td><input class="form-control input-" type="text" name="uname" maxlength="50" required /></td></tr>
						<tr><td>Password</td> <td><input class="form-control" type="password" name="password" id="pass1" required /></td></tr>
						<tr><td>Verify Password</td> <td><input class="form-control" type="password" name="passwordConfirm" id="pass2" onkeyup="matchCheck(); submitable(); return false;" required/>
								<span id="confirmMessage" ></span></td></tr>
						<tr><td>Email</td> <td><input class="form-control" type="text" name="mail" id="email" onkeyup="mailCheck(); submitable(); return false;" required />
								<span id="confirmMail" ></span></td></tr>
						<tr><td>Gender</td><td>
							<div class="radio">
							      <label><input type="radio" name="gender" value="Male">Male</label>
							    </div>
							    <div class="radio">
							      <label><input type="radio" name="gender">Female</label>
							    </div>
							    <div class="radio">
							      <label><input type="radio" name="gender">Unidentified item</label>
							    </div>
							</td></tr>
						<tr><td>Birthday</td> <td><input class="form-control" type="date" name="bday" required /></td></tr>
						<tr><td>Country</td>
							<td><select class="form-control" size="1" name="country[]">
								<option value="VN">Vietnam</option>
								<option value="FR">France</option>
								<option value="UK">United Kingdom</option>
								<option value="FL">Finland</option>
								<option value="NL">Netherland</option>
								<option value="MX">Mexico</option>
							</select></td></tr>
						<tr><td><input class="btn btn-primary" type="submit" name="submit" id="signup" value="Sign up">
						<input class="btn btn-warning" type="reset" name="clear" value="Clear"><td></tr>
				</form>	
			</table>
	</div>	
	<div class="login">
		<legend>Login</legend>
			<table><tr>				
					<form action="<?php echo site_url('/pictoria/login'); ?>" method="POST">
						<td>Username</td> <td><input class="form-control" type="text" name="unameLog" maxlength="50" required /></td></tr>
						<tr><td>Password</td> <td><input class="form-control" type="password" name="passLog" required /></td></tr>
						<tr><td><input class="btn btn-primary" type="submit" name="submitLog" value="Login">
							<input class="btn btn-warning" type="reset" name="clearLog" value="Clear"><td></tr>
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
				return true;
			}else{
				document.getElementById('signup').disabled = true;
				return false;
			}
		}
	</script>
	</div>
</body>
</html>	
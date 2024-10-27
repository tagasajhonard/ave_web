<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="logo">
</div>

<div class="containers">
  <div class="image">
    <img src="img/imgFIN.png" alt="Image" class="images">
  </div>
  <div class="txt">
    <h1>Welcome!</h1>
    <p class="one">Avenue's Admin</p>
    <p class="two">We're excited to have you join us to oversee store operations. Explore our tools to enhance customer experience and drive success."</p>
    <div class="button">
    	<div>
			<p>Click login to continue</p>
		</div>
		<div>
			<button class="open-overlay" id="loginBtn">LOGIN</button>
		</div>
	</div>
  </div>
</div>




	<div class="overlay">
		<div class="loginContainer">
			<div class="left">
				<img src="img/logIcon.jpg">
			</div>
			<div class="close-button">X</div>
			<div class="right">
				<div class="textLogin">
					<h2>Welcome Back :)</h2>
					<p>To keep connected with us please login with your personal username and password.</p>
				</div>
				<form method="post">
					<div class="input-wrapper logMargin">
    				<input type="text" id="inputFields" class="user" required name="uname" />
    				<label for="inputField" id="placeholder">Username</label>
				</div>
				<div class="input-wrapper">
    				<input type="password" id="inputField" class="pass" required name="upass" />
    				<label for="inputField" id="placeholder">Password</label>
    				<span class="toggle-password" ></span>
				</div>
				<div class="checkbox">
					<div>
						<input type="checkbox" name="">
						<label>Remember Me</label>	
					</div>
					<div>
						<label>Forgot Password?</label>
					</div>
				</div>
				<div>
					<input type="submit" name="check" id="submit" value="LOGIN">	
				</div>
				</form>
				
			</div>
		</div>
	</div>
	<div class="footer">
        <p>&copy; 2024 Syntax InnovateTors. All Rights Reserved.</p>
    </div>
	<?php

		include('include/connection.php');

		 if(isset($_SESSION['userID'])) {
    	header('Location: adminClone.php');
    	exit();
		}

		if (isset($_POST['check'])) {
			$Uname = $_POST['uname'];
			$Pass = $_POST['upass'];

			$sendData = "SELECT * FROM register";
			$holder = $myLoginSession->query($sendData);

	if ($holder->num_rows>0) {
		while ($rows = $holder->fetch_assoc()) {

			if ($Uname == $rows['Username'] && $Pass == $rows['Password']) { 
				$_SESSION['userID'] = $rows['userID'];
        		$_SESSION['username'] = $rows['Username'];
        		$_SESSION['fname'] = $rows['Fname'];
        		$_SESSION['lname'] = $rows['Lname'];
				header('location:adminClone.php');
				exit();
				} else {
        		echo '<script>
        					alert("The username or Password you entered is incorrect");
        		</script>';
    			}		
			}
      
    	}
	}

		if (isset($_POST['subBtn'])) {
			$id = $_POST['userid'];
			$Fname = $_POST['fname'];
		  	$Lname = $_POST['lname'];
		 	$Uname = $_POST['uname'];
		 	$Pass = $_POST['password'];

		 	$myAccount = "INSERT INTO register(userID,Fname,Lname,Username,Password)VALUES('{$id}','{$Fname}','{$Lname}','{$Uname}','{$Pass}')";
		 	if ($myLoginSession->query($myAccount)==TRUE) {
		 		 echo '<script>';
		 		 echo 'alert("You have successfully created an account");';
		 		 echo '</script>';
		 	}
		}


	?>

</body>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>

<script>
        $(document).ready(function(){


     		$(".toggle-password").click(function() {
        var passwordInput = $("#inputField");
        var toggleButton = $(".toggle-password");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            toggleButton.css("background-image", "url('img/hide.png')");
        } else {
            passwordInput.attr("type", "password");
            toggleButton.css("background-image", "url('img/visible.png')");
        }
    });

            // Open Overlay
            $('.open-overlay').click(function(){
                $('.overlay').fadeIn();
            });

            // Close Overlay
            $('.close-button').click(function(){
                $('.overlay').fadeOut();
            });

            // register script

            $('.open-overlay2').click(function(){
                $('.overlay2').fadeIn();
            });
            $('.close-button2').click(function(){
                $('.overlay2').fadeOut();
            });
        });
    </script>
</html>
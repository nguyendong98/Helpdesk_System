<?php
	session_start();
	include "./process/process.php"
?>
<!-- set up session   -->

<?php 
	if(isset($_POST['login'])){
		$username = $_POST["Email"];
		$password = $_POST["Password"];
		$query = mysqli_query($conn,"SELECT * FROM taikhoan WHERE TK_USERNAME = '$username' AND TK_PASSWORD = '$password' ");
		if(mysqli_num_rows($query) == 1){
			$row = mysqli_fetch_assoc($query);
			$_SESSION['id'] = $row['TK_ID'];
			$_SESSION['username'] = $row['TK_USERNAME'];
			$_SESSION['role'] = $row['TK_ROLE'];
			$_SESSION['avatar'] = $row['TK_AVATAR'];
				echo "<script language='javascript'>
							alert('Welcome logged into the system');
							window.open('index.php', '_self' , 1);
					</script>";
			
		}else{
			echo "
							<script language='javascript'>
								alert('Account does not exist');
								
							</script>
						";
		}	

	}


?>
<!-- process login  -->




<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Helpdesk</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />

<!-- Meta tag Keywords -->

<!-- css files -->
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<!-- css files -->
<!-- css aos animation  -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--  -->

</head>
<body>
<video autoplay loop muted poster="screenshot.jpg" id="background">
    <source src="img/video.mp4" type="video/mp4">
</video>
	<!-- main -->
	<div class="logo-w3" >Helpdesk System </div>
	<div class="main">
		
		<div class="main-w3l" >
			
			<div class="w3layouts-main" data-aos="flip-up">
				<h2><span>Login now</span></h2>
				<div class="social">
					<a href="#">Login With Facebook</a>
				</div>
					<h3>(or)</h3>
					<form action="" method="post">
						<input placeholder="Username or Email" name="Email" type="text" >
						<input placeholder="Password" name="Password" type="password" >
						<input type="submit" value="Get Started" name="login">
					</form>
					<h6><a href="#">Lost Your Password?</a></h6>
					
			</div>
			<!-- //main -->
			
			
		</div>
	</div>
	<script src="js/main.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>

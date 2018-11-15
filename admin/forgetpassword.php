<?php include "../classes/Adminlogin.php"?>

<?php
  $al= new Adminlogin();
  if($_SERVER['REQUEST_METHOD']=='POST'){
  	$email =$_POST['email'];  	
  	$SendPassword = $al->RecoveryPassword($email);
  }

?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Recovery Password</h1>
			<span style="color:red; font-size:18px;">
				<?php
				if(isset($SendPassword)){
				echo $SendPassword;

			}

				?>
				
			</span>  
			<div>
				<input type="text" placeholder="Enter Valid Email"  name="email"/>
			</div>
			
			<div>
				<input type="submit"  value="Send Email" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div>
		<div class="button">
			<a href="#">My Blog</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
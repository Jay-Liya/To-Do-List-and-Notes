<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Login</title>
	</head>

	<body>
		<form action="" method="post">			    

		    <div class="table">

		      <div class="row">

			  	<div class="leftcol">
			  		<p></p>
			  	</div>  	

			  	<div class="rightcol">
			    	<h4>User Login</h4>
			    	<h5 style="color:red;"><?php $login->error_login(); ?></h5>
			  	</div>

			  </div>			  

			  <div class="row">

			  	<div class="leftcol">
			  		<p>Username</p>
			  	</div>  	

			  	<div class="rightcol">
			    	<input name="username" type="text"  />
			  	</div>

			  </div>

			  <div class="row">

			  	<div class="leftcol">
			  		<p>Password</p>
			  	</div>  	

			  	<div class="rightcol">
			    	<input name="password" type="password"  />
			  	</div>

			  </div>
			  <div class="row">

			  	<div class="leftcol">
			  		<p></p>
			  	</div>  	

			  	<div class="rightcol">
			    	<input name="login" type="submit" value="Login" id="loginbtn" />
			    	<a href="register.php" id="regbtn">Register Here</a>
			  	</div>

			  </div>
			</div>  
		</form>
	</body>
</html>
<?php 
	session_abort();
?>

<html>
    <head>
			<title>Login</title>
			<link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
			<header>
				<h1>Login</h1>
			</header>
			<div class='Login'>
				<form method='post' name='frmLogin' action='userAuth.php'>
					<p>Username:</p>
					<input name='txtUser' type='text'>
					<br>
					<br>
					<p>Password:</p>
					<input name='txtPassword' type='password'>
					<br>
					<br>
					<input class='btn btn1' type='Submit' name='btnLogin' value='Login'>
				</form>
				
				<br>
				
				<form method='post' name='frmNewUser' action='newUser.php'>
					<input class='btn btn1' type='Submit' name='btnNewUser' value='Create Account'>
				</form>
			</div>
    </body>
</html>
<?php 
	session_abort();
?>

<html>
    <head>
			<title>Admin Login</title>
			<link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
			<header>
				<h1>Login</h1>
			</header>
			<div class='adminLogin'>
				<form method='post' name='frmLogin' action='userAuth.php'>
					<p>Username:</p>
					<input name='atxtUser' type='text'>
					<br>
					<br>
					<p>Password:</p>
					<input name='atxtPassword' type='password'>
					<br>
					<br>
					<input class='btn btn1' type='Submit' name='btnLogin' value='Login'>
				</form>
			</div>
    </body>
</html>
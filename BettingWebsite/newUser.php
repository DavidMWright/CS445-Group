<?php 
	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	
	
?>

<html>
    <head>
        <title>New User</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
			<h1>Create User</h1>
			
			<div class='Login'>
				<form method='post' action='createUser.php'>
					<p>First Name:</p>
					<input name='txtFName' type='text'>
					<br>
					<br>
					<p>Last Name:</p>
					<input name='txtLName' type='text'>
					<br>
					<br>
					<p>Username:</p>
					<input name='txtUser' type='text'>
					<br>
					<br>
					<p>Password:</p>
					<input name='txtPassword' type='password'>
					<br>
					<br>
					<input class='btn btn1' type='Submit' value='Create'>
				</form>
				
				<br><br>
				
				<form method='post' action='login.php'>
					<input class='btn btn1' type='Submit' value='Back'>
				</form>
			</div>
    </body>
</html>
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
					First Name:
					<input name='txtFName' type='text'>
					<br>
					<br>
					Last Name:
					<input name='txtLName' type='text'>
					<br>
					<br>
					Username:
					<input name='txtUser' type='text'>
					<br>
					<br>
					Password:
					<input name='txtPassword' type='password'>
					<br>
					<br>
					<input type='Submit' value='Create'>
				</form>
			</div>
    </body>
</html>
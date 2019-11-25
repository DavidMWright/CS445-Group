<?php 
	require_once('basicErrorHandling.php');
	require_once('connDB.php');
	
	if(!isset($_POST['txtUser']) || !isset($_POST['txtPassword']) || !isset($_POST['txtFName']) || !isset($_POST['txtLName']))
	{
		print '<html><head><title>Fail</titel></head><body>Error Missing Text Field<br>';
		print '<form method="post" action="login.html"><input type="Submit" value="Back"></form></body></html>';
	}
	
?>

<html>
	<head>
		<title>New User</title>
	</head>
	
	<body>
		<?php
			$salt = substr(hash("sha256",rand()), 0, 20);

			$dbh=db_connect();

			$info['fname']      = $_POST['txtFName'];
			$info['lname']      = $_POST['txtLName'];
			$info['username']  	= $_POST['txtUser'];
			$info['password']   = $_POST['txtPassword'];
			
			try
			{
				$sth = $dbh->prepare("INSERT INTO Users(FName, LName, Username, Passwd, Salt) VALUES (:fname,:lname,:user,:pass,:salt)");
			
				$hashedPW = crypt($info['password'] . $salt, '$2y$07$8d88bb4a9916b302c1c68c$');
									
				$sth->bindValue(":fname",$info['fname']);
				$sth->bindValue(":lname",$info['lname']);
				$sth->bindValue(":user",$info['username']);
				$sth->bindValue(":pass",$hashedPW);
				$sth->bindValue(":salt",$salt);
			
			
				$sth->execute();
			}
			catch (PDOException $e)
			{
			 printf ("The statement failed.\n");
			 printf ("getCode: ". $e->getCode () . "\n");
			 printf ("getMessage: ". $e->getMessage () . "\n");
			}
			
			print $info['fname'] ." have been succesfully added<br>";
		?>
		
		<form method="post" action="login.html">
			<input class='btn btn1' type="Submit" value="Back to Login">
		</form>
	</body>
</html>

<?php
	db_close($dbh);
?>
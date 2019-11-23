<?php 
	require_once(__DIR__ . '/BettingWebsite/basicErrorHandling.php');
	require_once(__DIR__ . '/BettingWebsite/connDB.php');
?>

<html>
	<head>
		<title></title>
	</head>
	
	<body>
		<?php
			$salt = substr(hash("sha256",rand()), 0, 20);

			$dbh=db_connect();
		
				// Insert Plain text data below;
				$info['fname']      = 'Tester';
				$info['lname']      = 'McTest';
				$info['username']  	= 'testydude';
				$info['password']   = 'badpassword';
				
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
				
				print "User " . $info['fname'] ." added<br>";

			db_close($dbh);
		?>
	</body>
</html>
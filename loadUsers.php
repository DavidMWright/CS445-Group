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
			
			$txt_file    = file_get_contents(__DIR__ . '/Users.txt');
			$rows        = explode("\n", $txt_file);
			array_shift($rows);

			foreach($rows as $row => $data)
			{
				$row_data = explode('|', $data);
				
				$info[$row]['fname']      = $row_data[0];
				$info[$row]['lname']      = $row_data[1];
				$info[$row]['username']  	= $row_data[2];
				$info[$row]['password']   = $row_data[3];
				
				try
				{
					$sth = $dbh->prepare("INSERT INTO Users(FName, LName, Username, Passwd, Salt) VALUES (:fname,:lname,:user,:pass,:salt)");
				
					$hashedPW = crypt($info[$row]['password'] . $salt, '$2y$07$8d88bb4a9916b302c1c68c$');
										
					$sth->bindValue(":fname",$info[$row]['fname']);
					$sth->bindValue(":lname",$info[$row]['lname']);
					$sth->bindValue(":user",$info[$row]['username']);
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
				
				print "User " . $info[$row]['fname'] ." added<br>";
			}
			
				//display data
				//print 'Row ' . $row . ' <b>FName: </b>' . $info[$row]['FName'] . ' <b>LName: </b>' . $info[$row]['LName'] . ' <b>Username: </b>' . $info[$row]['Username'] . ' <b>Password: </b>' . $info[$row]['Passwd'] . '<br />';

			db_close($dbh);
		?>
	</body>
</html>
<?php
	require_once('queryGetSalt.php');

	function queryValidUser($dbh, $user, $passwd)
	{
		$retVal = FALSE;
		
		$salt = queryGetSalt($dbh, $user)[0];
		print $salt . '<br>';
		
		$hashedPW = crypt($passwd.$salt, '$2y$07$8d88bb4a9916b302c1c68c$');
		
		$sth = $dbh->prepare("SELECT * FROM Users WHERE Username = :user and Passwd = :pass");
		
		$sth->bindValue(':user',$user);
		$sth->bindValue(':pass',$hashedPW);
		
		$sth->execute();
		
		$query = $sth->fetch();
		
		print $query['Username'] . ' Result<br>';
		
		if($query['Username'] == $user)
		{
			$retVal = TRUE;
		}
		
		return $retVal;
	}
?>
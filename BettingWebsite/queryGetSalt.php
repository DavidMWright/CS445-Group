<?php
	function queryGetSalt($dbh, $user, $passwd)
	{
		$sth = $dbh->prepare(
			"Select Salt From Users Where Username = :user and Passwd = :passwd"
		);
		
		$sth->bindValue(':user', $user);
		$sth->bindValue(':passwd', $passwd);
		
		$sth->execute();
		
		$salt = $sth->fetch();
		
		return $salt;
	}	
?>
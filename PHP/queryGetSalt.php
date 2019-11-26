<?php
	function queryGetSalt($dbh, $user)
	{
		$sth = $dbh->prepare(
			"Select Salt From Users Where Username = :user"
		);
		
		$sth->bindValue(':user', $user);
		
		$sth->execute();
		
		$salt = $sth->fetch();
		
		return $salt;
	}	
?>
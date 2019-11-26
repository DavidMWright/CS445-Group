<?php
	function queryAdmin($dbh, $user)
	{
		$retVal = FALSE;
		
		$sth = $dbh->prepare("SELECT * FROM Users, Admins WHERE Username = :user and UserID=AdminID");
		
		$sth->bindValue(':user',$user);
		
		$sth->execute();
		
		$query = $sth->fetch();
		
		if($query['Username'] == $user)
		{
			$retVal = $query['UserID'];
		}
		
		return $retVal;
	}
?>
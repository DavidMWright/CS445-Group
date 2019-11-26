<?php 
	function getBettorID($dbh, $userID)
	{
		$sth = $dbh->prepare("Select BettorID From Bettors Where BettorID=:userID");
		$sth->bindValue(':userID', $userID);
		$sth->execute();
		
		$id = $sth->fetch();
		
		return $id[0];
	}
?>
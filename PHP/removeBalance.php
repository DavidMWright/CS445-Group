<?php
  // Author: 			David Wright
  // File: 				removeBalance.php
  // Date:				November 24, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Subtract from user's balance

  
	function removeBalance($dbh, $userID, $amount)
	{
		$sth = $dbh -> prepare("Select Balance From Bettors Where BettorID = :userID");
		$sth->bindValue(':userID', $userID);
		
		$sth->execute();

		$oldBalance = $sth->fetch();
		$newBalance = $oldBalance[0] - $amount;
		
		
		$sth = $dbh -> prepare("Update Bettors Set Balance = :newBalance Where BettorID = :userID");
		$sth->bindValue(':newBalance', $newBalance);
		$sth->bindValue(':userID', $userID);
		
		$sth->execute();

	}
?>
<?php
  // Author: 			David Wright
  // File: 				insertBalance.php
  // Date:				11/21/2019
  // Class:				CS 445	
  // Project: 		Group Final
  // Description: Adds money to user balance
	
	function insertBalance($dbh, $userID, $amount)
	{
		$sth = $dbh -> prepare("Select Balance From Bettors Where BettorID = :userID");
		$sth->bindValue(':userID', $userID);
		
		$sth->execute();

		$oldBalance = $sth->fetch();
		$newBalance = $oldBalance[0] + $amount;
		
		
		$sth = $dbh -> prepare("Update Bettors Set Balance = :newBalance Where BettorID = :userID");
		$sth->bindValue(':newBalance', $newBalance);
		$sth->bindValue(':userID', $userID);
		
		$sth->execute();

	}
?>
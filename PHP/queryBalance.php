<?php
  // Author: 			David Wright
  // File: 				queryBalance.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query information about user's balance

  
	function getBalance($dbh, $userID)
	{
		$sth = $dbh -> prepare("Select Balance From Bettors Where BettorID=:userID");
		
		$sth->bindValue(':userID', $userID);
		
		// run the query
		$sth -> execute();

		$row = $sth -> fetch();

		return $row;
	}
?>
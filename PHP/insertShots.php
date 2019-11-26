<?php
	require_once('queryBettorID.php');
	
	function insertShots($dbh, $userID, $homeID, $awayID, $playerID, $amount)
	{
		$sth = $dbh->prepare("Insert Into Bet() Value()");
		$sth->execute();
		
		$sth = $dbh->prepare("Select BetID From Bet Order By BetID Desc Limit 1");
		$sth->execute();
		
		$betID = $sth->fetch();
					
					
		$sth = $dbh->prepare("Insert Into MadeBet(BetID, BettorID, HomeID, AwayID, Amount) VALUES(:betID, :bettorID, :homeID, :awayID, :amount)");
		
		$sth->bindValue(':betID', $betID[0]);
		$sth->bindValue(':bettorID', $userID);
		$sth->bindValue(':homeID', $homeID);
		$sth->bindValue(':awayID', $awayID);
		$sth->bindValue(':amount', $amount);
				
		$sth->execute();
		
		
		$sth = $dbh->prepare("Insert Into Shots(BetID, PlayerID) Values(:betID, :playerID)");
		$sth->bindValue(':betID', $betID[0]);
		$sth->bindValue(':playerID', $playerID);
		
		$sth->execute();
	}
?>
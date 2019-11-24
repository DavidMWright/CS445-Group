<?php
	require_once('queryBettorID.php');
	
	function insertWinBet($dbh, $userID, $homeID, $awayID, $winner, $amount)
	{
		$sth = $dbh->prepare("Insert Into Bet() Value()");
		$sth->execute();
		
		$sth = $dbh->prepare("Select BetID From Bet Order By BetID Desc Limit 1");
		$sth->execute();
		
		$betID = $sth->fetch();
				
		print $betID[0]. ", " .$userID. ", " .$homeID. ", " .$awayID. ", " .$amount;
		
		$sth = $dbh->prepare("Insert Into MadeBet(BetID, BettorID, HomeID, AwayID, Amount) VALUES(:betID, :bettorID, :homeID, :awayID, :amount)");
		
		$sth->bindValue(':betID', $betID[0]);
		$sth->bindValue(':bettorID', $userID);
		$sth->bindValue(':homeID', $homeID);
		$sth->bindValue(':awayID', $awayID);
		$sth->bindValue(':amount', $amount);
				
		$sth->execute();
		
		
		$sth = $dbh->prepare("Insert Into Win(BetID, TeamID) Values(:betID, :teamID)");
		$sth->bindValue(':betID', $betID[0]);
		$sth->bindValue(':teamID', $winner);
		
		$sth->execute();
	}
?>
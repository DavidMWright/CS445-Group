<?php
  // Author: 			David Wright
  // File: 				updateOutcomes.php
  // Date:				November 25, 2019
  // Class:				CS 445
  // Project: 		Betting Website
  // Description: Update outcomes and distribute winnings for win bets
	
	require_once('queryBalance.php');
  
	function updateWinOutcomes($dbh, $homeID, $awayID, $homeScore, $awayScore)
	{
		$bets = array();

		$sth = $dbh -> prepare(
										 "Select MadeBet.BetID From MadeBet, Matchs, Win
											Where MadeBet.HomeID=Matchs.HomeSportsTeamID 
											and MadeBet.AwayID=Matchs.AwaySportsTeamID
											and MadeBet.BetID=Win.BetID
											and MadeBet.HomeID=:homeID
											and MadeBet.AwayID=:awayID"
		);
		
		$sth -> bindValue(':homeID', $homeID);
		$sth -> bindValue(':awayID', $awayID);

		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$bets[] = $row;
		}
		
		foreach($bets as $data)
		{
			$sth = $dbh->prepare("Select TeamID, Bettors.BettorID, Amount From Win, MadeBet, Bettors 
														Where Win.BetID=MadeBet.BetID and MadeBet.BettorID=Bettors.BettorID and MadeBet.BetID=:betID");
			$sth->bindValue(':betID', $data['BetID']);
			
			$sth->execute();
			
			$bet = $sth -> fetch();
			
			
			$sth = $dbh->prepare("Update MadeBet Set Outcome=:outcome Where BetID=:betID");
			$sth->bindValue(':betID', $data['BetID']);
			
			if($bet['TeamID'] == $homeID && $homeScore > $awayScore || $bet['TeamID'] == $awayID && $awayScore > $homeScore)
			{
				$sth->bindValue(':outcome', 1);
				$win = true;
			}
			else
			{
				$sth->bindValue(':outcome', 0);
				$win = false;
			}
			
			$sth->execute();
			
			
			
			if ($win)
			{
				$sth = $dbh->prepare("Update Bettors Set Balance=:newBalance Where BettorID=:bettorID");
				$sth->bindValue(':bettorID', $bet['BettorID']);
				$sth->bindValue(':newBalance', $bet['Amount'] + getBalance($dbh, $bet['BettorID'])[0]);
				
				$sth->execute();
			}
		}
		
	}
?>
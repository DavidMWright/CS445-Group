<?php
  // Author: 			David Wright
  // File: 				updateOutcomes.php
  // Date:				November 25, 2019
  // Class:				CS 445
  // Project: 		Betting Website
  // Description: Update outcomes and distribute winnings for goal bets
	
	require_once('queryBalance.php');
  
	function updateGoalsOutcomes($dbh, $homeID, $awayID, $playerID)
	{
		$bets = array();

		$sth = $dbh -> prepare(
										 "Select MadeBet.BetID From MadeBet, Matchs, Goals
											Where MadeBet.HomeID=Matchs.HomeSportsTeamID 
											and MadeBet.AwayID=Matchs.AwaySportsTeamID
											and MadeBet.BetID=Goals.BetID
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
			$sth = $dbh->prepare("Select PlayerID, Bettors.BettorID, Amount From Goals, MadeBet, Bettors 
														Where Goals.BetID=MadeBet.BetID and MadeBet.BettorID=Bettors.BettorID and MadeBet.BetID=:betID");
			$sth->bindValue(':betID', $data['BetID']);
			
			$sth->execute();
			
			$bet = $sth -> fetch();
			
			
			$sth = $dbh->prepare("Update MadeBet Set Outcome=:outcome Where BetID=:betID");
			$sth->bindValue(':betID', $data['BetID']);
			
			if($bet['PlayerID'] == $playerID)
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
				$sth->bindValue(':newBalance', $bet['Amount'] + (getBalance($dbh, $bet['BettorID'])[0] * 2));
				
				$sth->execute();
			}
		}
		
	}
?>
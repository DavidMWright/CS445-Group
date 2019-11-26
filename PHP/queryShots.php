<?php	
	function getShots($dbh, $userID)
	{
		$rows = array();
		
		$sth = $dbh->prepare(
			 "Select Home.Name as HomeName, Away.Name as AwayName, Amount, Shots.PlayerID as Player, FinalScoreHome, FinalScoreAway, Bet.BetID
				From SportsTeams as Home, SportsTeams as Away, Matchs, MadeBet, Bet, Bettors, Shots
				Where Home.SportsTeamID = Matchs.HomeSportsTeamID
				and Away.SportsTeamID = Matchs.AwaySportsTeamID
				and Matchs.HomeSportsTeamID = MadeBet.HomeID
				and Matchs.AwaySportsTeamID = MadeBet.AwayID
				and MadeBet.BetID = Bet.BetID
				and MadeBet.BettorID = Bettors.BettorID
				and Bet.BetID = Shots.BetID
				and Bettors.BettorID = :userID"
		);
		
		$sth->bindValue(':userID', $userID);
		
		$sth->execute();
		
		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		
		return $rows;
	}
?>
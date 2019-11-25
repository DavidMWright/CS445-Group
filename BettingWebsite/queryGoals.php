<?php	
	function getGoals($dbh, $userID)
	{
		$rows = array();
		
		$sth = $dbh->prepare(
			 "Select Home.Name as HomeName, Away.Name as AwayName, Amount, Goals.PlayerID as Player
				From SportsTeams as Home, SportsTeams as Away, Matchs, MadeBet, Bet, Bettors, Goals
				Where Home.SportsTeamID = Matchs.HomeSportsTeamID
				and Away.SportsTeamID = Matchs.AwaySportsTeamID
				and Matchs.HomeSportsTeamID = MadeBet.HomeID
				and Matchs.AwaySportsTeamID = MadeBet.AwayID
				and MadeBet.BetID = Bet.BetID
				and MadeBet.BettorID = Bettors.BettorID
				and Bet.BetID = Goals.BetID
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
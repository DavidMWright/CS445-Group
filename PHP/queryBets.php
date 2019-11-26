<?php 
	function getBets($dbh, $userID)
	{
		$sth = $dbh->prepare(
			 "Select Home.Name as HomeName, Away.Name as AwayName, Amount
				From SportsTeams as Home, SportsTeams as Away, Matchs, MadeBet, Bettors
				Where Home.SportsTeamID = Matchs.HomeSportsTeamID
				and Away.SportsTeamID = Matchs.AwaySportsTeamID
				and Matchs.HomeSportsTeamID = MadeBet.HomeID
				and Matchs.AwaySportsTeamID = MadeBet.AwayID
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
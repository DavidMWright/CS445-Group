<?php
  // Author: 			David Wright
  // File: 				queryUpcomingMatches.php
  // Date:				November 25, 2019
  // Class:				CS 445
  // Project: 		Betting Website
  // Description: Query what games are upcoming

  
	function getUpcoming($dbh)
	{
		$rows = array();

		$sth = $dbh -> prepare(
										 "Select Home.SportsTeamID as HomeID, Home.Name as HomeName, Away.SportsTeamID as AwayID, Away.Name as AwayName, DateOfMatch
											From SportsTeams as Home, SportsTeams as Away, Matchs
											Where Home.SportsTeamID = Matchs.HomeSportsTeamID
											and Away.SportsTeamID = Matchs.AwaySportsTeamID
											and DateOfMatch > :currentDate
											Order by DateOfMatch Asc, HomeID"
		);
		
		$sth -> bindValue(":currentDate", date('Y-m-d'));

		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
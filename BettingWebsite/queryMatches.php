<?php
  // Author: 			David Wright
  // File: 				queryMatches.php
  // Date:				11/21/2019
  // Class:				CS 445	
  // Project: 		Group Final
  // Description: Gets any number of the lastest matches
	
	function getMatches($dbh, $numOutput)
	{
  	$rows = array();

  	$sth = $dbh->prepare(
			"Select Home.SportsTeamID as HomeID, Home.Name as HomeName, 
							Away.SportsTeamID as AwayID, Away.Name as AwayName, 
							DateOfMatch
			From SportsTeams as Home, SportsTeams as Away, Matchs
			Where Home.SportsTeamID = Matchs.HomeSportsTeamID
			and Away.SportsTeamID = Matchs.AwaySportsTeamID
			Order By Matchs.DateOfMatch Desc
			Limit :num"
		);
		
		$sth->bindValue(":num", $numOutput);

		// run the query	
  	$sth->execute();
	
  	while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
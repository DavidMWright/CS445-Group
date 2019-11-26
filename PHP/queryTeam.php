<?php
  // Author: 			David Wright
  // File: 				queryTeam.php
  // Date:				11/21/2019
  // Class:				CS 445	
  // Project: 		Group Final
  // Description: Gets team based off TeamID (PK)
	
	function getTeam($dbh, $teamID)
	{
  	$rows = array();

  	$sth = $dbh->prepare(
			"Select SportsTeamID, Name From SportsTeams Where SportsTeamID = " . $teamID 
		);
		
		// run the query	
  	$sth->execute();
	
  	while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
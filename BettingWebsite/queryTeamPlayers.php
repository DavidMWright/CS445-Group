<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing

  
	function getTeamPlayers($dbh, $TeamID)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT FName, LName
														FROM Players
														WHERE OnA = :team");
		$sth -> bindValue(":team", $TeamID);
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
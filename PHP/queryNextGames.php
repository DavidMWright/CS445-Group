<?php
  // Author: 			G2
  // File: 				queryNextGames.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query what games are next

  
	function getAllPlayersInMatch($dbh, $HomeTeamID, $AwayTeamID)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT FName, LName
														FROM Players
														WHERE OnA = :hometeam");
		$sth -> bindValue(":hometeam", $HomeTeamID);
		$sth -> bindValue(":awayteam", $AwayTeamID);
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
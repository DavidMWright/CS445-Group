<?php
  // Author: 			G2
  // File: 				queryPlayerProfile.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query information about players

  
	function getMatchStatsForPlayer($dbh, $PlayerID)
	{
		$rows = array();
		$sth = $dbh -> prepare("SELECT PlayerID, SUM(NumCards)as NumCards, SUM(NumGoals) as NumGoals, SUM(NumAssists) as NumAssists
														FROM MatchStats
														WHERE PlayerID =" . $PlayerID . 
														" GROUP BY PlayerID");
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
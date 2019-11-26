<?php
  // Author: 			G2
  // File: 				queryPlayerProfile.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query information about players

  
	function getPlayerProfile($dbh, $PlayerID)
	{
		$rows = array();
		$sth = $dbh -> prepare("SELECT Players.*, SportsTeams.Name, Logo.Image 
														FROM Players, SportsTeams, Logo
														WHERE 
															Players.OnA=SportsTeams.SportsTeamID
															AND SportsTeams.LogoID = Logo.LogoID
															AND Players.PlayerID=" . $PlayerID);
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>
<?php
	// Author: 			G2
  // File: 				queryPlayerProfile.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query information about players
	
	
	function insertGameResults($dbh, $hometeamID, $awayteamID, $shotsHomeTeam, 
															$shotsAwayTeam, $finalScoreHome,
															$finalScoreAway) {
		$sth = $dbh->prepare("UPDATE Matchs SET ShotsOnGoalHome=:shotsHomeTeam, 
													ShotsOnGoalAway=:shotsAwayTeam, 
													FinalScoreHome=:finalScoreHome, 
													FinalScoreAway=:finalScoreAway 
													WHERE HomeSportsTeamID=:hometeamID 
													AND AwaySportsTeamID=:awayteamID");
													
		$sth->bindValue(":hometeamID",$hometeamID);
		$sth->bindValue(":awayteamID",$awayteamID);
		$sth->bindValue(":shotsHomeTeam",$shotsHomeTeam);
		$sth->bindValue(":shotsAwayTeam",$shotsAwayTeam);
		$sth->bindValue(":finalScoreHome",$finalScoreHome);
		$sth->bindValue(":finalScoreAway",$finalScoreAway);
		$sth->execute();	
	}
?>
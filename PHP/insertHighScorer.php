<?php
	// Author: 			G2
  // File: 				queryPlayerProfile.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query information about players
	
	
	function insertHighScorer($dbh, $playerID, $hometeamID, $awayteamID, 
														$goals) {
		$sth = $dbh->prepare("INSERT INTO MatchStats 
													(PlayerID, HomeSportsTeamID, 
													AwaySportsTeamID, NumCards, 
													NumGoals, NumAssists) 
													VALUES (:playerID, :hometeamID, :awayteamID, 
													0, :goals, 0)");
												
		$sth->bindValue(":playerID",$playerID);
		$sth->bindValue(":hometeamID",$hometeamID);
		$sth->bindValue(":awayteamID",$awayteamID);
		$sth->bindValue(":goals",$goals);
		$sth->execute();	
	}
?>
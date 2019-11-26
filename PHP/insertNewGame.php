<?php
	// Author: 			G2
  // File: 				queryPlayerProfile.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Query information about players
	
	
	function insertNewGame($dbh, $hometeamID, $awayteamID, $date) {
		$sth = $dbh->prepare("INSERT INTO Matchs (HomeSportsTeamID, 
													AwaySportsTeamID, DateOfMatch) 
													VALUES (:hometeamID, :awayteamID, :date)");
													
		$sth->bindValue(":hometeamID",$hometeamID);
		$sth->bindValue(":awayteamID",$awayteamID);
		$sth->bindValue(":date",$date);
		$sth->execute();	
	}
?>
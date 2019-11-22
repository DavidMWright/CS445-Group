<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing

  
	function getLogos($dbh, $TeamID)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT Image
														FROM Logo
														WHERE LogoID = :team");
		$sth -> bindValue(":team", $TeamID);
		// run the query
		$sth -> execute();

		$row = $sth->fetch();
		$data = $row['Image'];
		$type = "png";
	  Header( "Content-type: $type");
	  //print $data;
		return $data;
	}
?>
<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing

  require_once 'connDB.php';
	$dbh = db_connect();
	
	if( isset($_GET['id']) )
	{
		//$rows = array();
		$id = $_GET['id'];
		$sth = $dbh -> prepare("SELECT Image, Type
														FROM Logo
														WHERE LogoID = :team");
		$sth->bindValue(":team",$id);
		// run the query
		$sth -> execute();

		$row = $sth->fetch();
		$data = $row['Image'];
		$type = $row['Type'];
	  Header( "Content-type: $type");
	  print $data;
	}
?>
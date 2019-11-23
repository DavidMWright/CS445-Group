<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing
	
	require_once ('connDB.php');
	require_once 'queryPlayerProfile.php';
	require_once ('basicErrorHandling.php');
	session_start();

	 $dbh = db_connect();
?>

<html>

	<head>
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
	<div class="banner-text">
		<ul>
			<li>Player Number</li>
			<li>First Name</li>
			<li>Last Name</li>
			<li>Height</li>
			<li>Weight</li>
			<li>Team Name</li>
		</ul>
	</div>
	
	<div class="animation-area">
		<ul class="box-area">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	</body>

</html>

<?php
	db_close($dbh);
?>
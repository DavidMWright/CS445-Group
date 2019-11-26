<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing
	
	require_once ('connDB.php');
	require_once 'queryGameTeamsRosters.php';
	require_once (__DIR__.'/../basicErrorHandling.php');
	session_start();

	 $dbh = db_connect();
?>

<html>

	<head>
		<title></title>
	</head>

	<body>
		
	  <?php
		$data = getAllPlayersInMatch($dbh);

		foreach ( $data as $row )
		{
  			print $row[0] . ' ' . $row[1] . ' <br/> ';
//				print $row[2] . ' ' . $row[3]
//				.' <br/> ';
		}
		?>
		
	</body>

</html>

<?php
	db_close($dbh);
?>
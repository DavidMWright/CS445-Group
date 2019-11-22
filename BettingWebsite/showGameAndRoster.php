<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing
	
	require_once ('connDB.php');
	require_once 'queryTeamPlayers.php';
	require_once ('basicErrorHandling.php');
	session_start();

	 $dbh = db_connect();
?>

<html>

	<head>
		<title></title>
	</head>

	<body>
		
	  <?php
		$value = explode(" ", $_POST['teams']);
		$hometeam = getTeamPlayers($dbh, $value[0]);
		//$awayteam = getTeamPlayers($dbh, $value[1]);
		foreach ($value as $row)
		{
			print $row;
		}

//		foreach ( $hometeam as $row )
//		{
//  			print $row[0] . ' ' . $row[1] . ' <br/> ';
////				print $row[2] . ' ' . $row[3]
////				.' <br/> ';
//		}
		
		$rows = 1; // create variable
		print "<table border=1 cellpadding=4>";
		foreach ( $hometeam as $row )
		{
			print "<tr>";
			$columns = 0; // create variable
			while( $columns < 1)
			{
				print "<td>";
				print $row[0] . " , " . $row[1];
				print "</td>";
				$columns += 1;
			}
			print "</tr>";
			$rows += 1;
		}
		print "</table>";
		?>
		
	</body>

</html>

<?php
	db_close($dbh);
?>
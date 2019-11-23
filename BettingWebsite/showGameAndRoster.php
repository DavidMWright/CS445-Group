<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing
	
	require_once ('connDB.php');
	require_once 'queryTeamPlayers.php';
	require_once 'queryLogos.php';
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
		
	  <?php
		$value = explode(" ", $_POST['teams']);
		$hometeam = getTeamPlayers($dbh, $value[0]);
		//$awayteam = getTeamPlayers($dbh, $value[1]);
		
//		print "<table border=1 cellpadding=4>
//						<tr>";
//		$hometeamlogo = getLogos($dbh, $value[0]);
//		print "<td>";
//		print $hometeamlogo;
//		print "</td>";
//		print "	</tr>
//					</table>";
//		
//		foreach ($value as $row)
//		{
//			print $row;
//		}

//		foreach ( $hometeam as $row )
//		{
//  			print $row[0] . ' ' . $row[1] . ' <br/> ';
////				print $row[2] . ' ' . $row[3]
////				.' <br/> ';
//		}
		print "<form method='post' action='showPlayerProfile.php'>";
		$rows = 1; // create variable
		print '<div style="margin-left: auto; margin-right: auto; width: 50%">';
		print "<table border=1 cellpadding=4>";
		foreach ( $hometeam as $row )
		{
			print "<tr>";
			$columns = 0; // create variable
			while( $columns < 2)
			{
				print '<td><span class="container"><button class="btn btn1" style="height:40px;width:400px" name="players" type="Submit" Value=' . $row[2] . "," . $value[0] . "," . $value[0] . ">";
				print strtoupper($row[0]) . " " . strtoupper($row[1]) . "</button></span></td>";
				$columns += 1;
			}
			print "</tr>";
			$rows += 1;
		}
		print "</table>";
		print "/div";
		print "</form>";
		?>
		
	</body>

</html>

<?php
	db_close($dbh);
?>
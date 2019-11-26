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
		$value = array();
		$value = explode(',', $_POST['teams']);
		$hometeam = getTeamPlayers($dbh, $value[0]);
		$awayteam = getTeamPlayers($dbh, $value[1]);
		
		print '<div style="margin-left: auto; margin-right: auto; width: 50%">';
		print "<table border=1 cellpadding=4>";
		print "<tr>";
				print '<td class="btn btn1"><span class="container">';
				print $value[0] . "</span></td>";
				print '<td class="btn btn1"><span class="container">';
				print $value[1] . "</span></td>";
			print "</tr>";
		print '<tr><td><span class="container">';
		print '<img style="width:420px" src="queryLogos.php?id=' . $value[0] . '"></span></td>';
		print '<td><span class="container">';
		print '<img style="width:420px" src="queryLogos.php?id=' . $value[1] . '"></span></td></tr>';
		print "</table>";
		print "</div>";

		print "<form method='post' action='showPlayerProfile.php'>";
		
		print '<div style="margin-left: auto; margin-right: auto; width: 50%">';
		print "<table border=1 cellpadding=4>";
		if (count($hometeam) > count ($awayteam)) {
			$rows = 1; // create variable
			foreach ( $hometeam as $row ) {
				print "<tr>";
					print '<td><span class="container"><button class="btn btn1" style="height:40px;width:400px" name="players" type="Submit" Value=' . $row['PlayerID'] . "," . $value[0] . "," . $value[1] . ">";
					print strtoupper($row['FName']) . " " . strtoupper($row['LName']) . "</button></span></td>";
					if (isset($awayteam[$rows]['PlayerID'])) {
						print '<td><span class="container"><button class="btn btn1" style="height:40px;width:400px" name="players" type="Submit" Value=' . $awayteam[$rows]['PlayerID'] . "," . $value[0] . "," . $value[1] . ">";
						print strtoupper($awayteam[$rows]['FName']) . " " . strtoupper($awayteam[$rows]['LName']) . "</button></span></td>";
					}
				print "</tr>";
				$rows += 1;
			}
		}
		else {
			$rows = 1; // create variable
			foreach ( $awayteam as $row ) {
				print "<tr>";
				if (isset($hometeam[$rows]['PlayerID'])) {
					print '<td><span class="container"><button class="btn btn1" style="height:40px;width:400px" name="players" type="Submit" Value=' . $hometeam[$rows]['PlayerID'] . "," . $value[0] . "," . $value[1] . ">";
					print strtoupper($hometeam[$rows]['FName']) . " " . strtoupper($hometeam[$rows]['LName']) . "</button></span></td>";
				}
				print '<td><span class="container"><button class="btn btn1" style="height:40px;width:400px" name="players" type="Submit" Value=' . $row['PlayerID'] . "," . $value[0] . "," . $value[1] . ">";
				print strtoupper($row['FName']) . " " . strtoupper($row['LName']) . "</button></span></td>";
				print "</tr>";
				$rows += 1;
			}
		}
		
		print "</table>";
		print "</div>";
		print "</form>";
		?>
		
		<form class="banner-text" align="center" method='post' action='home.php'>
			
				<?php
						print '<span align="center" class="container"><button class="btn btn1">';
						print "Back </button></span></td>";
				?>
		</form>
	</body>

</html>

<?php
	db_close($dbh);
?>
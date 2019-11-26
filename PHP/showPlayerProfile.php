<?php
  // Author: 			G2
  // File: 				queryGameTeamsRosters.php
  // Date:				November 26, 2019
  // Class:				CS 445	
  // Project: 		Betting Website
  // Description: Get rosters for teams that are playing
	
	require_once ('connDB.php');
	require_once 'queryPlayerProfile.php';
	require_once 'queryMatchStatsForPlayer.php';
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
	<div align="center">
	<?php
		$value = explode(',', $_POST['players']);
		$data = getPlayerProfile($dbh, $value[0]);
		$matchstats = getMatchStatsForPlayer($dbh, $value[0]);
		foreach ($data as $row)	 {
					print '<span><img style="width:420px" src="queryLogos.php?id=' . $row[5] . '"></span>';
				}
		
	?>
		<table border=1 cellpadding=4>
			<tr>
				<th>Player Number</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Height</th>
				<th>Weight</th>
				<th>Team Name</th>
				<th>Num Cards</th>
				<th>Num Goals</th>
				<th>Num Assists</th>
			</tr>
			<tr>
			<?php
				foreach ($data as $row)	 {
					print "<td>" . $row[0] . "</td>";
					print "<td>" . $row[1] . "</td>";
					print "<td>" . $row[2] . "</td>";
					print "<td>" . $row[3] . "</td>";
					print "<td>" . $row[4] . "</td>";
					print "<td>" . $row[6] . "</td>";
				}
				if (isset($matchstats[0])) {
					foreach ($matchstats as $row)	 {
						print "<td>" . $row[1] . "</td>";
						print "<td>" . $row[2] . "</td>";
						print "<td>" . $row[3] . "</td>";
					}
				}
				else {
					print "<td>" . 0 . "</td>";
					print "<td>" . 0 . "</td>";
					print "<td>" . 0 . "</td>";
				}
				
				?>
			</tr>
		</table>
		</div>
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
	
	<form class="banner-text" align="center" method='post' action='showGameAndRoster.php'>
			
				<?php
						print '<span align="center" class="container"><button class="btn btn1" align="center" name="teams" type="Submit" Value=' . $value[1] . ',' . $value[2] . '>';
						print "Back </button></span></td>";
				?>
		</form>
	
		
	</body>

</html>

<?php
	db_close($dbh);
?>
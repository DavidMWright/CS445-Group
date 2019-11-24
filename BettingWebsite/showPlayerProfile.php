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
		<table border=1 cellpadding=4>
			<tr>
				<th>Player Number</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Height</th>
				<th>Weight</th>
				<th>Team Name</th>
			</tr>
			<tr>
			<?php
				$value = explode(',', $_POST['players']);
				$data = getPlayerProfile($dbh, $value[0]);
				foreach ($data as $row)	 {
					print "<td>" . $row[0] . "</td>";
					print "<td>" . $row[1] . "</td>";
					print "<td>" . $row[2] . "</td>";
					print "<td>" . $row[3] . "</td>";
					print "<td>" . $row[4] . "</td>";
					print "<td>" . $row[6] . "</td>";
				}
				?>
			</tr>
		</table>
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
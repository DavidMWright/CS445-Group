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
	</head>

	<body>
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
		$value = $_POST['players'];
		$data = getPlayerProfile($dbh, $value);
		foreach ($data as $row)	
		{
			print "<td>" . $row[0] . "</td>";
			print "<td>" . $row[1] . "</td>";
			print "<td>" . $row[2] . "</td>";
			print "<td>" . $row[3] . "</td>";
			print "<td>" . $row[4] . "</td>";
			print "<td>" . $row[5] . "</td>";
		}
		?>
	</tr>
	</table>
	</body>

</html>

<?php
	db_close($dbh);
?>
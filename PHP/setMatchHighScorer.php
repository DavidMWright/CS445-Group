<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');

	session_start();
	
	$dbh = db_connect();
	
	require_once ('authHelp.php');
	require_once('queryTeamPlayers.php');
	
	$value = array();
	$value = explode(',', $_POST['team']);
	$hometeamID = $value[0];
	$awayteamID = $value[1];
	$hometeam = getTeamPlayers($dbh, $hometeamID);
	$awayteam = getTeamPlayers($dbh, $awayteamID);
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
            <h1>Set Highest Scorer</h1>
        </header>
				<form method='post' action='showAddHighScorer.php'>
					<?php
						print "Player: <select name='player'>";
						foreach ( $hometeam as $entry ) {
							print "<option value='" . $entry['PlayerID'] . "'>" . $entry['FName'] . " " . $entry['LName'] . "</option>";
						} 
						foreach ( $awayteam as $entry ) {
							print "<option value='" . $entry['PlayerID'] . "'>" . $entry['FName'] . " " . $entry['LName'] . "</option>";
						} 
						print "</select>";
						print "Number of Goals:<input type='number' Name='goals'>";
						print '<button class="btn btn1" name="teams" type="Submit" Value=' . $hometeamID . ',' . $awayteamID . '>Go</button>';
					?>
				</form>
				<form method='post' action='adminHome.php'>					
					<?php
					print '<button class="btn btn1">';
					print "Back" . "</button>";
					?>
				</form>
				
    </body>
</html>

<?php
	db_close($dbh);
?>
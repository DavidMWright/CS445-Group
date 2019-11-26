<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');
	require_once('insertGameResults.php');
	require_once('queryTeam.php');
	
	session_start();
	
	$dbh = db_connect();
	
	require_once ('authHelp.php');
	
	$value = array();
		$value = explode(',', $_POST['teams']);
		$hometeamID = $value[0];
		$awayteamID = $value[1];
		$hometeam = getteam($dbh, $hometeamID);
		$awayteam = getteam($dbh, $awayteamID);
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
            <h1>Set Game Results</h1>
        </header>
				
				<?php  
					print "<table><tr>";
					print '<td class="btn btn1">';
					print $hometeam[0]['Name'] . ' vs. ' . $awayteam[0]['Name'];
					print '</td><tr><table>'; 
				?>
				
				<form method='post' action='showAddMatchResults.php'>
					
					Number of Shots on Goal for Home Team:<input type='number' Name='ShotsOnGoalHome'>
					Number of Shots on Goal for Away Team:<input type='number' Name='ShotsOnGoalAway'>
					Final Score for Home Team:<input type='number' Name='FinalScoreHome'>
					Final Score for Away Team:<input type='number' Name='FinalScoreAway'>
					
					<?php
					print '<button class="btn btn1" name="teams" type="Submit" Value=' . $hometeamID . ',' . $awayteamID . '>Go</button>';
					?>
				</form>
				<form method='post' action='setMatchHighScorer.php'>
					<ul>
						<?php 
								print '<button class="btn btn1" name="team" type="Submit" Value=' . $hometeamID . ',' . $awayteamID . '>';
								print "Add High Scorer";
								print '</button>'; 
						?>
					</ul>
				</form>
				<form method='post' action='adminHome.php'>					
					<?php
					print '<br><button class="btn btn1">';
					print "Back" . "</button>";
					?>
				</form>
    </body>
</html>

<?php
	db_close($dbh);
?>
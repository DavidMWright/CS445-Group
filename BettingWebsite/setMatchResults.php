<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');
	require_once('insertGameResults.php');
	
	session_start();
	
	$dbh = db_connect();
	
	require_once ('authHelp.php');
	
	$value = array();
		$value = explode(',', $_POST['teams']);
		$hometeamID = $value[0];
		$awayteamID = $value[1];
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
				
				<form method='post' action='showAddMatchResults.php'>
					
					Number of Shots on Goal for Home Team:<input type='number' Name='ShotsOnGoalHome'>
					Number of Shots on Goal for Away Team:<input type='number' Name='ShotsOnGoalAway'>
					Final Score for Home Team:<input type='number' Name='FinalScoreHome'>
					Final Score for Away Team:<input type='number' Name='FinalScoreAway'>
					
					<?php
					print '<button class="btn btn1" name="teams" type="Submit" Value=' . $hometeamID . ',' . $awayteamID . '>Go</button>';
					?>
				</form>
    </body>
</html>

<?php
	db_close($dbh);
?>
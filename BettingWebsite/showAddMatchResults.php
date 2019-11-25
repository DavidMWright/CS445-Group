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
		$shotsHomeTeam = $_POST['ShotsOnGoalHome'];
		$shotsAwayTeam = $_POST['ShotsOnGoalAway'];
		$finalScoreHome = $_POST['FinalScoreHome'];
		$finalScoreAway = $_POST['FinalScoreAway'];
		
		insertGameResults($dbh, $hometeamID, $awayteamID, $shotsHomeTeam,
											$shotsAwayTeam, $finalScoreHome, 
											$finalScoreAway);
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
			<form class="banner-text" align="center" method='post' action='setMatchResults.php'>
			
				<?php
						print '<span align="center" class="container"><button class="btn btn1" align="center" name="teams" type="Submit" Value=' . $value[0] . ',' . $value[1] . '>';
						print "Back </button></span>";
				?>
			</form>
    </body>
</html>

<?php
	db_close($dbh);
?>
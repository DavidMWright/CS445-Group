<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');
	require_once('insertHighScorer.php');
	
	session_start();
	
	$dbh = db_connect();
	
	//require_once ('authHelp.php');
	
		$value = explode(',', $_POST['teams']);
		$playerID = $_POST['player'];
		$hometeamID = $value[0];
		$awayteamID = $value[1];
		$goals = $_POST['goals'];
		
		insertHighScorer($dbh, $playerID, $hometeamID, $awayteamID, 
											$goals);
?>

<html>
    <head>
        <title>High Scorer Added</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
			<h1>High Scorer Added</h1>
			<form class="banner-text" align="center" method='post' action='adminHome.php'>
			
				<?php
						print '<span align="center" class="container"><button class="btn btn1" align="center">';
						print "Home </button></span>";
				?>
			</form>
    </body>
</html>

<?php
	db_close($dbh);
?>
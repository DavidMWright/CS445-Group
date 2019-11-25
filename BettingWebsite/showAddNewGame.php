<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');
	require_once('insertNewGame.php');
	
	session_start();
	
	$dbh = db_connect();
	
	//require_once ('authHelp.php');
	
		$hometeamID = $_POST['hometeam'];
		$awayteamID = $_POST['awayteam'];
		$date = $_POST['date'];
		
		insertNewGame($dbh, $hometeamID, $awayteamID, $date);
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
			<form class="banner-text" align="center" method='post' action='setNewGame.php'>
			
				<?php
						print '<span align="center" class="container"><button class="btn btn1" align="center">';
						print "Back </button></span>";
				?>
			</form>
    </body>
</html>

<?php
	db_close($dbh);
?>
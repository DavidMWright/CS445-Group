<?php 
	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	require_once ('queryMatches.php');
	
	session_start();
	
	require_once ('authHelp.php');
	
	$dbh = db_connect();
	
	$matchRows = getMatches($dbh, 4);
?>


<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
					<form align="center" method='post' action='setMatchResults.php'>
            <ul>
							<?php  
								foreach($matchRows as $data)
								{
									print '<li><button class="btn btn1" name="teams" type="Submit" Value=' . $data['HomeID'] . ',' . $data['AwayID'] . '>';
									print $data['HomeName'] . ' vs. ' . $data['AwayName'];
									print '</li>'; 
								}
							?>
						</ul>
					</form>
					
					<form align="center" method='post' action='setNewGame.php'>
            <ul>
							<?php  
								
									print '<button class="btn btn1">Add New Game</button>';
							?>
						</ul>
					</form>
        </header>

    </body>
</html>

<?php
	db_close($dbh);
?>
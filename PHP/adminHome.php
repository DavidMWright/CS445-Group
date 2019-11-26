<?php 
	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	require_once ('queryUpcomingMatches.php');
	
	session_start();
	
	require_once ('authHelp.php');
	
	$dbh = db_connect();
	
	$matchRows = getUpcoming($dbh);
?>


<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
					<h1>Upcoming Games</h1>
					<div class='matches'>
						<form method='post' action='setMatchResults.php'>
							<ul>
								<?php  
									foreach($matchRows as $data)
									{
										if($data['FinalScoreHome'] == NULL)
										{
											print '<li><button class="btn btn1" name="teams" type="Submit" Value=' . $data['HomeID'] . ',' . $data['AwayID'] . '>';
											print $data['HomeName'] . ' vs. ' . $data['AwayName'];
											print '</li>';
										} 
									}
								?>
							</ul>
						</form>
					</div>
				</header>
				
				<div>
					<br><br><br><br><hr align="center"><br>
					
					<form method='post' action='setNewGame.php'>
						<ul>
							<?php  
								
									print '<button class="btn btn1">Add New Game</button>';
							?>
						</ul>
					</form>
				</div>
    </body>
</html>

<?php
	db_close($dbh);
?>
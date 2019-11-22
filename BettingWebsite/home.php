<?php 
	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	require_once ('queryMatches.php');
	
	session_start();
	
	$dbh = db_connect();
	
	$matchRows = getMatches($dbh, 4);
	$allMatches = getMatches($dbh, 10);
?>


<html>
    <head>
        <title>Bet</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
					<form method='post' action='showGameAndRoster.php'>
            <ul>
							<?php  
								foreach($matchRows as $data)
								{
									print '<li><button name="teams" type="Submit" Value=' . $data['HomeID'] . ' ' . $data['AwayID'] . '>';
									print $data['HomeName'] . ' vs. ' . $data['AwayName'];
									print '</li>'; 
								}
							?>
						</ul>
					</form>
        </header>

        <nav>
					
        </nav>
				
				<div id='CurrentBets'>
					
				</div>
				
				<div id='MakeBet'>
					<h3>Place Bet</h3>
					
					<form method='post' action='betPage.php'>
						<select Name='BetType'>
							<option Value='win'>Match Winner</option>
							<option Value='mostShots'>Most Shots</option>
						</select>
						
						<select Name='Match'>
							<?php
								foreach($allMatches as $data)
								{
									print '<option Value='. $data['HomeID'] . ' ' . $data['AwayID'] . '>';
									print $data['HomeName'] . ' vs. ' . $data['AwayName'];
									print '</option>';
								}
							?>
						</select>
						
						<button type="Submit">Go</button>
					</form>
				</div>
				
        <footer>
					
        </footer>
    </body>
</html>

<?php
	db_close($dbh);
?>
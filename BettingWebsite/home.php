<?php 
	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	require_once ('queryMatches.php');
	
	session_start();
	
	$dbh = db_connect();
	
	$matchRows = getMatches($dbh, 4);
?>


<html>
    <head>
        <title>Home</title>
				
        <link rel="stylesheet" type="text/css" href="style.css">
				<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
					<form method='post1' action='showGameAndRoster.php'>
            <ul>
							<?php  
								foreach($matchRows as $data)
								{
									print '<li><button type="Submit" Value=' . $data['HomeID'] . ' ' . $data['AwayID'] . '>';
									print $data['HomeName'] . ' vs. ' . $data['AwayName'];
									print '</li>'; 
								}
							?>
						</ul>
					</form>>
        </header>

        <nav>
					
        </nav>
				
				<div>
					
				</div>
				
        <footer>
					
        </footer>
    </body>
</html>

<?php
	db_close($dbh);
?>
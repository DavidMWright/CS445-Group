<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');
	require_once('queryTeam.php');
	
	session_start();
	
	$dbh = db_connect();
	
	//require_once ('authHelp.php');
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
            <h1>Add New Game</h1>
        </header>
				
				<form method='post' action='showAddNewGame.php'>
					<?php  
						print "<select name='hometeam'>";
						for ($i = 1; $i < 20; $i++) {
							$value = getTeam($dbh, $i);
							foreach ($value as $row) {
								print "<option value='" . $row['SportsTeamID'] . "'>" . $row['Name'] . "</option>";
							}
						} 
						print "</select>";
						print "<select name='awayteam'>";
						for ($i = 1; $i < 20; $i++) {
							$value = getTeam($dbh, $i);
							foreach ($value as $row) {
								print "<option value='" . $row['SportsTeamID'] . "'>" . $row['Name'] . "</option>";
							}
						}
						print "</select>";
						print "Date:<input type='date' Name='date'>";
					?>
					<?php
					print '<button class="btn btn1">Add</button>';
					?>
				</form>
    </body>
</html>

<?php
	db_close($dbh);
?>
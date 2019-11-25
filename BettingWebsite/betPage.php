<?php 
	require_once('basicErrorHandling.php');
	require_once('connDB.php');
	require_once('queryTeam.php');
	require_once('queryTeamPlayers.php');
	
	
	session_start();
	
	require_once ('authHelp.php');
	
	if (!isset($_POST['BetType']))
	{
		die("ERROR: No BetType");
	}
	
	if (!isset($_POST['Match']))
	{
		die("ERROR: No Match");
	}
	
	
	$betType = $_POST['BetType'];
	$match = explode(',', $_POST['Match']);
	
	$homeTeamID = $match[0];
	$awayTeamID = $match[1];
	
	$dbh = db_connect();
	
	$home = getTeam($dbh, $homeTeamID);
	$away = getTeam($dbh, $awayTeamID);
	
	$hPlayers = getTeamPlayers($dbh, $homeTeamID);
	$aPlayers = getTeamPlayers($dbh, $awayTeamID);
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
            <h1>Place Your Bet</h1>
        </header>

        <nav>

        </nav>
				
				<form method='post' action='betPlaced.php'>
						<?php
							if($betType == 'win')
							{
								print '<select Name="WinBet">';

								print '<option Value=' . $homeTeamID . ',' . $awayTeamID . ',' . $homeTeamID . '>' . $home[0]['Name'] . '</option>';
								print '<option Value=' . $homeTeamID . ',' . $awayTeamID . ',' . $awayTeamID . '>' . $away[0]['Name'] . '</option>';
							}
//-------------------------------------------------------	
							if($betType == 'mostShots')
							{
								print '<select Name="ShotBet">';
								
								foreach($hPlayers as $data)
								{
									print '<option Value=' . $homeTeamID . ',' . $awayTeamID . ','. $data['PlayerID'] . '>' . $data['FName'] . ' ' . $data['LName'] . '</option>';
								}
								
								foreach($aPlayers as $data)
								{
									print '<option Value=' . $homeTeamID . ',' . $awayTeamID . ',' . $data['PlayerID'] . '>' . $data['FName'] . ' ' . $data['LName'] . '</option>';
								}
							}
//-------------------------------------------------------
							
						?>
					</select>
					
					Bet Amount:<input type='number' Name='Amount'>
					
					<button type="Submit">Go</button>
				</form>

        <footer>

        </footer>
    </body>
</html>

<?php
	db_close($dbh);
?>
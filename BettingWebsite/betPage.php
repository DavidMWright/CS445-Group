<?php 
	require_once("basicErrorHandling.php");
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
	
	$dbh = db_connect();
	
	$home = getTeam($dbh, $match[0]);
	$away = getTeam($dbh, $match[1]);
	
	$hPlayers = getTeamPlayers($dbh, $match[0]);
	$aPlayers = getTeamPlayers($dbh, $match[1]);
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
				
				<form mathod='post' action='home.php'>
						<?php
							if($betType == 'win')
							{
								print '<select Name="winBet">';
								
								print '<option Value=home>' . $home[0]['Name'] . '</option>';
								print '<option Value=away>' . $away[0]['Name'] . '</option>';
							}
							elseif($betType == 'mostShots')
							{
								print '<select Name="shotBet">';
								
								foreach($hPlayers as $data)
								{
									print '<option Value=' . $data['PlayerID'] . '>' . $data['FName'] . ' ' . $data['LName'] . '</option>';
								}
								
								foreach($aPlayers as $data)
								{
									print '<option Value=' . $data['PlayerID'] . '>' . $data['FName'] . ' ' . $data['LName'] . '</option>';
								}
							}
						?>
					</select>
					
					Bet Amount:<input type='number' name='amount'>
					
					<button type="Submit">Go</button>
				</form>

        <footer>

        </footer>
    </body>
</html>

<?php
	db_close($dbh);
?>
<?php
	require_once('basicErrorHandling.php');
	require_once('connDB.php');
	require_once('insertWinBet.php');
	
	session_start();
	
	require_once ('authHelp.php');
	
	if(!isset($_POST['Amount']))
	{
		die('ERROR: No Bet Amount');
	}
	
	$userID = $_SESSION['UserID'];
	$amount = $_POST['Amount'];	
	
	$dbh = db_connect();
		
	
	if (isset($_POST['WinBet']))
	{
		$winBet = explode(',', $_POST['WinBet']);
		insertWinBet($dbh, $userID, $winBet[0], $winBet[1], $winBet[2], $amount);
	}
	/*
	elseif(isset($_POST['ShotBet'])
	{
		$shotBet = $_POST['ShotBet'];
		//query
	}
	else
	{
		db_close($dbh);
		die("ERROR: No Bet Post Data");
	}
	*/
?>

<html>
    <head>
        <title>Good Luck!</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
           <h1>Bet Placed</h1> 
        </header>

				<div>
					<form method='post' action='home.php'>
						<button type="Submit">Home</button>
					</form>
				</div>
    </body>
</html>

<?php
	db_close($dbh);
?>
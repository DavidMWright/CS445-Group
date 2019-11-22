<?php 
	require_once("basicErrorHandling.php");
	require_once('connDB.php');
	
	session_start();
	
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
				
				<div>
					<?php
						print $betType . '<br>' . $match[0] . ' ' . $match[1];
					?>
				<div>

        <footer>

        </footer>
    </body>
</html>


<?php
	db_close($dbh);
?>
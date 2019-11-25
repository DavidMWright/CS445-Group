<?php
	require_once('basicErrorHandling.php');
	require_once('connDB.php');
	require_once('insertBalance.php');
	
	session_start();
	
	if(!isset($_POST['Amount']))
	{
		die('ERROR: No Funds');
	}
	
	$dbh = db_connect();
	
	insertBalance($dbh, $_SESSION['UserID'], $_POST['Amount']);
?>

<html>
    <head>
        <title>Thanks</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
           <h1>Funds Added</h1> 
        </header>

				<div>
					<form method='post' action='home.php'>
						<button class= 'btn btn1' type="Submit">Home</button>
					</form>
				</div>
    </body>
</html>

<?php
	db_close($dbh);
?>
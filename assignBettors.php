<?php 
	require_once('BettingWebsite/basicErrorHandling.php');
	require_once ('BettingWebsite/connDB.php');
?>


<html>
	<body>
		<?php
			$dbh=db_connect();
			
			$rows = array();

			$sth = $dbh -> prepare("SELECT UserID FROM Users LEFT JOIN Admins ON Users.UserID = Admins.AdminID");
			// run the query
			$sth -> execute();
			
			while ($row = $sth -> fetch())
			{
				$rows[] = $row;
			}
			
			
			foreach ($rows as $inputRow)
			{
				try
				{
					$sth = $dbh->prepare("INSERT INTO Bettors(BettorID, Balance) VALUES (:bettorid, :balance)");
					
					$sth->bindValue(":bettorid",$inputRow[0]);
					$sth->bindValue(":balance", rand(100, 50000));

					$sth->execute();
					
					print "Added<br>";
				}
				catch (PDOException $e)
				{
					printf ("The statement failed.\n");
					printf ("getCode: ". $e->getCode () . "\n");
					printf ("getMessage: ". $e->getMessage () . "\n");
				} 
			}

			db_close($dbh);
		?>
	</body>
</html>
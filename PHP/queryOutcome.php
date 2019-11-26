<?php	
	function getOutcome($dbh, $betID)
	{
		$sth = $dbh->prepare("Select Outcome From MadeBet Where BetID=:betID");
		
		$sth->bindValue(':betID', $betID);
		
		$sth->execute();
		
		$row = $sth -> fetch();
		
		
		return $row[0];

	}
?>
<?php
	if (!isset($_SESSION['VALID']) || $_SESSION['VALID'] != 1)
	{
		print $_SESSION['VALID'];
		// header('Location: badSession.html');
	}
?>
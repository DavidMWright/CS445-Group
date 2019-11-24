<?php
	if (!isset($_SESSION['VALID']) || $_SESSION['VALID'] != 1)
	{
		header('Location: badSession.html');
	}
?>
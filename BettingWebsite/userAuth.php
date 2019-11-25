<?php
	require_once('basicErrorHandling.php');
	require_once('connDB.php');
	require_once('queryValidUser.php');
	require_once('queryAdmin.php');
	
	session_start();
	
	$dbh = db_connect();
	
	$_SESSION['VALID'] = 0;
	
	if(isset($_POST['txtUser']) && isset($_POST['txtPassword']))
	{
		$userID = $_POST['txtUser'];
		$passwd = $_POST['txtPassword'];
		
		$result = queryValidUser($dbh, $userID, $passwd);
		
		if( 0 != $result )
		{
			$_SESSION['VALID'] = 1;
			$_SESSION['UserID'] = $result;
			header('Location: home.php');
		}
		else
		{
			header('Location: failedLogin.html');
		}
	}
	elseif (isset($_POST['atxtUser']) && isset($_POST['atxtPassword']))
	{
		$userID = $_POST['atxtUser'];
		$passwd = $_POST['atxtPassword'];
		
		$result = queryValidUser($dbh, $userID, $passwd);
		$aResult = queryAdmin($dbh, $userID);
		
		if( 0 != $result && 0 != $aResult)
		{
			$_SESSION['VALID'] = 1;
			$_SESSION['UserID'] = $result;
			header('Location: adminHome.php');
		}
		else
		{
			header('Location: failedLogin.html');
		}
	}
	else
	{
			print 'Post Failed';
	}
?>
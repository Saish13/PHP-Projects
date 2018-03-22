<?php

	define('DBHOST','localhost');
	define('DBUSER','root');
	define('DBPASS','');
	define('DBNAME','cas');
	
	$dbconn=mysql_connect(DBHOST,DBUSER,DBPASS);
	
	if (!$dbconn)
	{
		die('Could not connect to database'.mysql_error());
	}

	$selectdb=mysql_select_db(DBNAME,$dbconn);
	
	if (!$selectdb)
	{
		die('Could not find database'.mysql_error());
	}
	
	session_start();

?>
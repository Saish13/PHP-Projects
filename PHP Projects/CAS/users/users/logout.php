<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if($_SESSION['username'] || $_SESSION['password'])
{
	session_destroy();
	header("location:index.php?notify=You are Logged out.");
}
?>
<?php
	
	session_start();
	if (isset($_SESSION['user']))
	        header('Location: MainWindow.php');
	    else
	    	header('Location: auth.php');
	
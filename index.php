<?php
	
	session_start();
	if (isset($_SESSION['user']))
	        header('Location: rating.php');
	    else
	    	header('Location: auth.php');
	
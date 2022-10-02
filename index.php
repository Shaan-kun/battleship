<?php
	
	session_start();

	$DEBUG = true; // на релизе изменить на false

	if ($DEBUG) {
		echo 'debug';
	}
	else {
	    if (isset($_SESSION['user']))
	    {
	        header('Location: rating.php');
	    }
    }
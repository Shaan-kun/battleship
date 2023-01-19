<?php
    
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $database = 'battleship';

    $connect = mysqli_connect($host, $user, $password, $database);

    if (!$connect) {
        die('Error connect to DataBase');
    }
